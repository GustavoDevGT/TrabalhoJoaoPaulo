@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg rounded-4 w-100" style="max-width: 900px;">
            <div class="card-body">
                <h1 class="text-center text-success mb-4">Dashboard - Produtos</h1>

                <p class="text-center fs-5">
                    Olá, <strong>{{ Auth::user()->name }}</strong>!
                    Você tem <strong>{{ $produtos->count() }} produto(s)</strong> no total.
                </p>

                <div class="text-center mb-4">
                    <a href="{{ route('produtos.create') }}" class="btn btn-success btn-lg">
                        Adicionar Produto
                    </a>
                </div>

                @if ($produtos->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center rounded-4 overflow-hidden" style="border-collapse: separate; border-spacing: 0;">
                            <thead class="table-dark">
                                <tr>
                                    <th class="rounded-top-left">Nome</th>
                                    <th>Preço</th>
                                    <th>Imagem</th>
                                    <th class="rounded-top-right">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produtos as $produto)
                                    <tr>
                                        <td class="align-middle">{{ $produto->nome }}</td>
                                        <td class="align-middle">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                                        <td class="align-middle">
                                            @if ($produto->imagem)
                                                <img src="{{ asset('storage/' . $produto->imagem) }}" alt="Imagem do Produto" width="100">
                                            @else
                                                <span class="text-muted">Sem imagem</span>
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center text-muted py-5">
                        <h4 class="mb-3">Nenhum produto cadastrado</h4>
                        <p>Use o botão acima para adicionar seu primeiro produto.</p>
                    </div>
                @endif

                <div class="text-center mt-4">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-lg">
                            Sair
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection





