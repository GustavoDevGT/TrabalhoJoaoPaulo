<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::with('user')->get();
        $produtos = auth()->user()->produtos;
        return view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validação de imagem
        ]);

        // Verifique se a imagem foi realmente enviada
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');


            // Define um nome único para a imagem
            $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension();

            // Tente mover a imagem para o diretório de destino
            try {
                $imagem->move(public_path('storage/produtos'), $nomeImagem);
            } catch (\Exception $e) {
            }

            // Armazenar o caminho da imagem
            $imagemPath = 'storage/produtos/' . $nomeImagem;
        }

        // Cria o produto com o caminho da imagem
        Produto::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'imagem' => $imagemPath ?? null, // Caso não haja imagem, salva null
            'user_id' => auth()->id(),  // Associar ao usuário logado
        ]);

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        // Verificar se o produto pertence ao usuário logado
        if ($produto->user_id !== auth()->id()) {
            return redirect()->route('produtos.index')->with('error', 'Você não tem permissão para editar este produto!');
        }

        return view('produtos.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {

        // Verificar se o produto pertence ao usuário logado
        if ($produto->user_id !== auth()->id()) {
            return redirect()->route('produtos.index')->with('error', 'Você não tem permissão para atualizar este produto!');
        }

        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            // Excluir a imagem antiga, se existir
            if ($produto->imagem) {
                Storage::disk('public')->delete($produto->imagem);
            }

            // Armazenar a nova imagem
            $imagemPath = $request->imagem->store('produtos', 'public');
            $produto->imagem = $imagemPath;
        }

        // Atualizar o produto
        $produto->update($request->only('nome', 'descricao', 'preco'));

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {

        // Verificar se o produto pertence ao usuário logado
        if ($produto->user_id !== auth()->id()) {
            return redirect()->route('produtos.index')->with('error', 'Você não tem permissão para atualizar este produto!');
        }

        $produto->delete();

        return redirect()->route('produtos.index')->with('success', 'Produto removido com sucesso!');
    }


    //metodo para vizualizar os produtos
    public function publico()
    {
        $produtos = Produto::all();
        return view('produtos.publico', compact('produtos'));
    }
}
