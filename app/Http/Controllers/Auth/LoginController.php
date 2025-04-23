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

        return redirect()->route('produtos.index');


    }

    public function logout(Request $request)
{
    Auth::logout(); // Faz o logout do usuário

    // Limpa a sessão e gera um novo token de CSRF
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Força que a página não seja armazenada em cache
    return redirect()->route('login')->withHeaders([
        'Cache-Control' => 'no-store, no-cache, must-revalidate, proxy-revalidate',
        'Pragma' => 'no-cache',
        'Expires' => '0',
    ]);
}
}

