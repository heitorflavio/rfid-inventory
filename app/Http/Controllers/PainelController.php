<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Produtos;
use App\Models\TagProdutos;
use App\Models\Estoque;
use Barryvdh\DomPDF\PDF; 

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

        $valorOut = 0;
        $valorIn = 0;

        $in = Estoque::where('status', 1)->latest()->take(5)->get();
        $out = Estoque::where('status', 0)->latest()->take(5)->get();

        foreach ($in as $key => $value) {
            $prod = Produtos::where('id', $value->produto_id)->first();
            $value->nome = $prod->nome;
            $value->sku = $prod->sku;
            $value->preco = $prod->preco;
        }

        foreach ($out as $key => $value) {
            $prod = Produtos::where('id', $value->produto_id)->first();
            $value->nome = $prod->nome;
            $value->sku = $prod->sku;
            $value->preco = $prod->preco;
        }

        $input = Estoque::where('status', 1)->whereDate('created_at', now())->get();
        $output = Estoque::where('status', 0)->whereDate('created_at', now())->get();

        foreach ($input as $key => $value) {
            $prod = Produtos::where('id', $value->produto_id)->first();
            $valorIn += $prod->preco;
        }

        foreach ($output as $key => $value) {
            $prod = Produtos::where('id', $value->produto_id)->first();
            $valorOut += $prod->preco;
        }

        $inputDate = Estoque::where('status', 1)->whereDate('created_at', now())->get(); 
        $outputDate = Estoque::where('status', 0)->whereDate('created_at', now())->get();

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
            'input' => $input,
            'output' => $output,
            'valorIn' => $valorIn,
            'valorOut' => $valorOut,
            'inputDate' => count($inputDate),
            'outputDate' => count($outputDate),
            'ins' => $in,
            'out' => $out,

        ]);
    }

    public function produtos()
    {
        $produtos = Produtos::orderBy('id', 'desc')->get();

        foreach ($produtos as $key => $value) {
            $estoque = Estoque::where('produto_id', $value->id)->where('status', 1)->get();
            $value->estoque = count($estoque);
        }

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

    public function relatorio(PDF $pdf)
    {

        
        
        
        $estoque = Estoque::where('status', 1)->get();
        $produtos = Produtos::orderBy('id', 'desc')->get();
        $total = 0;

        foreach ($estoque as $key => $value) {
            $prod = Produtos::where('id', $value->produto_id)->first();
            $total += $prod->preco;
        }

        foreach ($produtos as $key => $value) {
            $estoque = Estoque::where('produto_id', $value->id)->where('status', 1)->get();
            $value->estoque = count($estoque);
        }

        $data = ['title' => 'Relatório de Produtos', 'produtos' => $produtos, 'total' => $total, 'count' => count($produtos)];

        $pdf = $pdf->loadView('myPDF', $data);

        return $pdf->download('relatorio.pdf');
    }
}
