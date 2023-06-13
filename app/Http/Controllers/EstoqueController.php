<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use App\Models\TagProdutos;
use App\Http\Requests\StoreEstoqueRequest;
use App\Http\Requests\UpdateEstoqueRequest;

class EstoqueController extends Controller
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
    public function store(StoreEstoqueRequest $request, $id)
    {

        $response = [];

        foreach ($request->tags as $key => $value) {

            $estoque = Estoque::create([
                'user_id' => 1,
                'produto_id' => $id,
                'tag' => $value,
                'status' => 1,
            ]);

            $response = [$value => $estoque];

            $tag = TagProdutos::where('hash', $value)->where('status', 1)->first();
            $tag->update(['status' => 0]);
        }


        return response()->json($tag);
    }

    /**
     * Display the specified resource.
     */
    public function show(Estoque $estoque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estoque $estoque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEstoqueRequest $request, Estoque $estoque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estoque $estoque)
    {
        //
    }

    public function down(StoreEstoqueRequest $request)
    {

        $estoque = Estoque::where('tag', $request->tag)->where('status', 1)->first();
        if ($estoque) {
            $estoque->status = 0;
            $estoque->save();
        } else {
            $estoque = Estoque::where('tag', $request->tag)->where('status', 0)->first();
            $estoque->status = 1;
            $estoque->save();
        }

        return 'true';
    }
}
