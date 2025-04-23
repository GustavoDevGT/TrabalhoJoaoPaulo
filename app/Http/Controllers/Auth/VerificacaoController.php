<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CodigoVerificacao;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

class VerificacaoController extends Controller
{
    public function showForm()
    {
        return view('auth.verificar');
    }

    public function verificar(Request $request)
    {
        $request->validate([
            'code' => 'required|string|size:6',
        ]);

        $codigo = CodigoVerificacao::where('code', $request->code)->first();

        if (!$codigo) {
            return back()->with('error', 'Código inválido.');
        }

        $user = $codigo->user;
        $user->email_verified_at = Carbon::now();
        $user->email_verified = true;
        $user->save();

        // Autentica o usuário
        Auth::login($user);

        // Redireciona para o dashboard
        return redirect()->route('dashboard');
    }
}

