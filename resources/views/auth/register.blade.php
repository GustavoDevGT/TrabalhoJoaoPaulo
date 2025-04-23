@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Cadastro</h2>

        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('registrar') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-outline-primary w-100 text-center">Registrar</button>
            <hr class="my-4">
            <a href="{{ route('login.form') }}" class="btn btn-outline-primary w-100 text-center">Já tem uma conta? Fazer login</a>
        </form>
    </div>
@endsection

