@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Adicionar Produto</h1>

        <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Nome -->
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Produto</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>

            <!-- Descrição -->
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control" rows="4"></textarea>
            </div>

            <!-- Preço -->
            <div class="mb-3">
                <label for="preco" class="form-label">Preço</label>
                <input type="number" name="preco" id="preco" class="form-control" required step="0.01">
            </div>

            <!-- Imagem -->
            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem</label>
                <input type="file" name="imagem" id="imagem" class="form-control" accept="image/*">
            </div>

            <!-- Botão de Salvar -->
            <button type="submit" class="btn btn-success w-100">Salvar Produto</button>
        </form>
    </div>
@endsection


