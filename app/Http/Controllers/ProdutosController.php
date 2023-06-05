<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use App\Http\Requests\StoreProdutosRequest;
use App\Http\Requests\UpdateProdutosRequest;
use Inertia\Inertia;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produtos::orderBy('id', 'desc')->get();
        return Inertia::render('Produtos',['produtos' => $produtos]);
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
        // print_r($request->all());
        // exit;
        
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

        return $request->image;
        if(!$request->image){
            $image_path = '';
            
        }else{            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image_path = $image->storeAs('img/skills', $imageName);
           
        }

        $produtos = Produtos::create([
            'nome' => $validatedData['nome'],
            'descricao' => $request->descricao,
            'preco' => $validatedData['valor'],
            'categoria' => $validatedData['categoria'],
            'subcategoria' => $validatedData['subcategoria'],
            'marca' => $validatedData['marca'],
            'modelo' => $validatedData['modelo'],
            'sku' => $validatedData['sku'],
            'imagem' =>  $image_path,
            'unidade' => $validatedData['unidade']
        ]);

      
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Produtos $produtos)
    {
        //
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
    public function update(UpdateProdutosRequest $request, Produtos $produtos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produtos $produtos)
    {
        //
    }
}
