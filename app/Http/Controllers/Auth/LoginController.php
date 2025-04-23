<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'Credenciais inválidas.']);
        }

        // Verifica se o usuário já foi verificado
        if (!$user->email_verified) {
            return redirect()->route('verificar.codigo.form')->with('error', 'Você precisa verificar seu código antes de fazer login.');
        }

        Auth::login($user);

        return redirect()->route('dashboard');


    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login'); // Redireciona para a página de login
    }
}
