<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use App\Http\Requests\StoreProdutosRequest;
use App\Http\Requests\UpdateProdutosRequest;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produtos::orderBy('id', 'desc')->get();
        return Inertia::render('Produtos', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdutosRequest $request)
    {
        try {
            $validatedData = $request->validate([
                'nome' => 'required',
                'valor' => 'required',
                'categoria' => 'required',
                'subcategoria' => 'required',
                'marca' => 'required',
                'modelo' => 'required',
                'sku' => 'required|unique:produtos',
                'unidade' => 'required'
            ]);

            // $valor = $validatedData['valor'];

            // print_r( Controller::Valor($validatedData['valor']));
            // exit;


            if (!$request->image) {
                $image_path = '';
            } else {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->extension();
                $image_path = $image->storeAs('img/produtos', $imageName);
            }

            $produtos = Produtos::create([
                'nome' => $validatedData['nome'],
                'descricao' => $request->descricao,
                'preco' => Controller::Valor($validatedData['valor']),
                'categoria' => $validatedData['categoria'],
                'subcategoria' => $validatedData['subcategoria'],
                'marca' => $validatedData['marca'],
                'modelo' => $validatedData['modelo'],
                'sku' => $validatedData['sku'],
                'imagem' =>  $image_path,
                'unidade' => $validatedData['unidade']
            ]);


            return Inertia::render('ProdutosCadastro', ['user' => auth()->user(), 'msg' => 'Produto Atualizado Com Sucesso !!']);
        } catch (\Exception $e) {
            return Inertia::render('Produtos', ['user' => auth()->user(), 'error' => 'Erro ao Atualizar Produto: ' . $e]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produtos $produtos, $id)
    {
        $produto = Produtos::where('id', $id)->first();

        return Inertia::render('ProdutosEdita', [
            'produto' => $produto, 'user' => auth()->user(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produtos $produtos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdutosRequest $request, Produtos $produtos, $id)
    {
        try {
            $validatedData = $request->validate([
                'nome' => 'required',
                'descricao' => 'required',
                'categoria' => 'required',
                'subcategoria' => 'required',
                'marca' => 'required',
                'modelo' => 'required',
                'sku' => 'required',
                'unidade' => 'required'
            ]);
            if (!$request->image) {
                $image_path = '';
            } else {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->extension();
                $image_path = $image->storeAs('img/produtos', $imageName);
            }

            $produto = Produtos::where('id', $id)->first();

            $produto->update([
                'nome' => $validatedData['nome'],
                'descricao' => $validatedData['descricao'],
                'preco' =>  Controller::Valor($request->valor),
                'categoria' => $validatedData['categoria'],
                'subcategoria' => $validatedData['subcategoria'],
                'marca' => $validatedData['marca'],
                'modelo' => $validatedData['modelo'],
                'sku' => $validatedData['sku'],
                'imagem' =>  $image_path,
                'unidade' => $validatedData['unidade']
            ]);

            return Inertia::render('ProdutosEdita', ['produto' => $produto, 'user' => auth()->user(), 'msg' => 'Produto Atualizado Com Sucesso !!']);
        } catch (\Exception $e) {
            return Inertia::render('ProdutosEdita', ['produto' => $produto, 'user' => auth()->user(), 'error' => 'Erro ao Atualizar Produto: ' . $e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produtos $produtos)
    {
        //
    }
}
