<?php

namespace App\Http\Controllers;

use App\Models\TagProdutos;
use App\Models\TagMestre;
use App\Models\Estoque;
use App\Models\User;
use App\Http\Requests\StoreTagProdutosRequest;
use App\Http\Requests\UpdateTagProdutosRequest;

class TagProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreTagProdutosRequest $request)
    {

        $tag = TagProdutos::where('hash', $request->tag)->where('status', 1)->first();
        $mestre = TagMestre::where('hash',$request->tag)->first();
        $estoque = Estoque::where('tag', $request->tag)->where('status', 1)->first();
       
        if($estoque){
            return response()->json([
                'code' => 403,
                'status' => 'error',
                'msg' => 'tag ja cadastrada no estoque'
            ]);
        }
        if($mestre){
            return response()->json([
                'code' => 403,
                'status' => 'error',
                'msg' => 'tag ja cadastrada'
            ]);
        }
        if($tag){
            return response()->json([
                'code' => 403,
                'status' => 'error',
                'msg' => 'tag ja cadastrada'
            ]);
        }

        $name = User::where('tag', $request->masterTag)->first();
        
        $tag = TagProdutos::create([
            'hash' =>  $request->tag,
            'master' => $request->masterTag,
            'name' => $name->name,
            'status' => 1
        ]);

        return 'true';
    }

    /**
     * Display the specified resource.
     */
    public function show(TagProdutos $tagProdutos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TagProdutos $tagProdutos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagProdutosRequest $request, TagProdutos $tagProdutos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TagProdutos $tagProdutos)
    {
        //
    }

}
