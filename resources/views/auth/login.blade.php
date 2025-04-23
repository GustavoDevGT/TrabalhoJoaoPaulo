@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 600px; margin-top: 50px;">
        <h2 class="text-center mb-4">Entrar</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu e-mail" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Digite sua senha" required>
            </div>

            <button type="submit" class="btn btn-outline-primary w-100 text-center">Login</button>
            <hr class="my-4">
            <a href="{{ route('registrar.form') }}" class="btn btn-outline-primary w-100 text-center">Ainda nao tem uma conta? Registrar-se</a>
            <hr class="my-4">
            <a href="{{ route('produtos.publico') }}" class="btn btn-outline-primary w-100 text-center">Ir para a pagina de produtos</a>
        </form>
    </div>
@endsection
