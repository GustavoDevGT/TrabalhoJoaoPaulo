@extends('layouts.app')

@section('content')
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Loja Genérica</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login.form') }}">Venha Trabalhar Conosco</a>
                    </li>
                </ul>
                <form class="d-flex ms-auto">
                    <input class="form-control me-2" type="search" placeholder="Pesquisar produtos" aria-label="Pesquisar">
                    <button class="btn btn-outline-light" type="submit">Pesquisar</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Produtos -->
    <div class="container mt-5 mb-5">
        <h1 class="text-center mb-4 text-white">Produtos Disponíveis</h1>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($produtos as $produto)
                <div class="col">
                    <div class="card h-100 shadow-sm bg-secondary text-white">
                        <div class="card-body d-flex flex-column">
                            @if ($produto->imagem)
                                <img src="{{ asset('storage/' . $produto->imagem) }}" class="card-img-top mb-3" alt="{{ $produto->nome }}">
                            @else
                                <img src="https://via.placeholder.com/150" class="card-img-top mb-3" alt="Sem imagem">
                            @endif
                            <h5 class="card-title">{{ $produto->nome }}</h5>
                            <p class="card-text">{{ Str::limit($produto->descricao, 100) }}</p>
                            <p class="card-text"><strong>R$ {{ number_format($produto->preco, 2, ',', '.') }}</strong></p>
                            <p><small>Postado por: {{ $produto->user->name }}</small></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('footer')
    <!-- Rodapé fixado no final da página -->
    <footer class="bg-dark text-white text-center py-4 mt-auto">
        <div class="container">
            <p>&copy; 2025 Loja Genérica. Todos os direitos reservados.</p>
            <p>Precisa de ajuda? <a href="{{ route('login.form') }}" class="text-light">Venha Trabalhar Conosco</a></p>
        </div>
    </footer>
@endsection






