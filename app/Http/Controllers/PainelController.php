<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Produtos;
use App\Models\TagProdutos;
use App\Models\Estoque;

class PainelController extends Controller
{
    //

    public function dashboard()
    {
        $produtos = Produtos::orderBy('id', 'desc')->get();
        $tags = TagProdutos::where('status', 1)->get();
        $tags = count($tags);
        $produtos = count($produtos);
        $estoque = Estoque::where('status', 1)->get();

        $total = 0;
        $items = count($estoque);

        foreach ($estoque as $key => $value) {
            $prod = Produtos::where('id', $value->produto_id)->first();
            $total += $prod->preco;
        }

        return Inertia::render('Dashboard', [
            'user' => auth()->user(),
            'total' => $total,
            'produtos' => $produtos,
            'items' => $items,
            'tags' => $tags,
        ]);
    }

    public function produtos()
    {
        $produtos = Produtos::orderBy('id', 'desc')->get();
        return Inertia::render('Produtos', [
            'produtos' => $produtos,
            'user' => auth()->user(),
        ]);
    }

    public function produtosCadastro()
    {
        return Inertia::render('ProdutosCadastro', [
            'user' => auth()->user(),
        ]);
    }

    public function login()
    {
        return Inertia::render('Login');
    }

    public function redirect()
    {
        return redirect('/dashboard');
    }

    public function tags()
    {
        $tags = TagProdutos::where('status', 1)->get();
        return Inertia::render('Tags', ['tags' => $tags, 'user' => auth()->user()]);
    }

    public function produtosEstoque($id)
    {

        $produto = Produtos::where('id', $id)->first();
        $tags = TagProdutos::where('status', 1)->get();

        return Inertia::render('ProdutosEstoque', [
            'user' => auth()->user(),
            'produto' => $produto,
            'tags' => $tags,
        ]);
    }
}
