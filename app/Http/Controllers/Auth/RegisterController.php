<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\CodigoVerificacaoMail;
use App\Models\CodigoVerificacao;


class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // gera o código de verificação
        $codigo = CodigoVerificacao::create([
            'user_id' => $user->id,
            'code' => str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT), // gera um codigo de 6 dígitos
        ]);

        // manda o codigo pro email do usuario
        Mail::to($user->email)->send(new CodigoVerificacaoMail($codigo));

        return redirect()->route('verificar.form')->with('message', 'Verifique seu e-mail para o código de verificação.');
    
    }

    // mostrando o formulario de registro
    public function showForm()
    {
        return view('auth.register');
    }
}
