@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center text-success mb-4">Dashboard - Produtos</h1>

        <p class="text-center" style="font-size: 18px;">
            Olá, <strong>{{ Auth::user()->name }}</strong>!
            Você tem
            <strong>{{ $produtos->count() }} produto(s)</strong> no total.
        </p>

        <div class="text-center mb-4">
            <a href="{{ route('produtos.create') }}" class="btn btn-success">
                Adicionar Produto
            </a>
        </div>

        @if ($produtos->count() > 0)
            <table class="table table-bordered table-striped" style="border-radius: 10px; overflow: hidden;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->nome }}</td>
                            <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                            <td>
                                @if ($produto->imagem)
                                    <img src="{{ asset('storage/' . $produto->imagem) }}" alt="Imagem do Produto" width="100">
                                @else
                                    <span>Sem imagem</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center text-muted">Não há produtos cadastrados.</p>
        @endif

        <!-- Botão de Sair -->
        <div class="text-center mt-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-lg">
                    Sair
                </button>
            </form>
        </div>
    </div>
@endsection



