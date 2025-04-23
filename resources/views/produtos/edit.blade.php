@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Editar Produto</h1>

        <form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nome -->
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ $produto->nome }}" required>
            </div>

            <!-- Descrição -->
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control" rows="4">{{ $produto->descricao }}</textarea>
            </div>

            <!-- Preço -->
            <div class="mb-3">
                <label for="preco" class="form-label">Preço</label>
                <input type="text" name="preco" id="preco" class="form-control" value="{{ $produto->preco }}" required>
            </div>

            <!-- Imagem -->
            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem</label>
                <input type="file" name="imagem" id="imagem" class="form-control" accept="image/*">
            </div>

            @if ($produto->imagem)
                <div class="mb-3">
                    <p><strong>Imagem Atual:</strong></p>
                    <img src="{{ asset('storage/' . $produto->imagem) }}" alt="Imagem do produto" width="100">
                </div>
            @endif

            <!-- Botão de Atualizar -->
            <button type="submit" class="btn btn-success w-100">Atualizar Produto</button>
        </form>
    </div>
@endsection
