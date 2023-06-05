<?php

namespace App\Http\Controllers;

use App\Models\TagMestre;
use App\Models\User;
use App\Http\Requests\StoreTagMestreRequest;
use App\Http\Requests\UpdateTagMestreRequest;
use Illuminate\Http\Request;

class TagMestreController extends Controller
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
    public function store(StoreTagMestreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TagMestre $tagMestre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TagMestre $tagMestre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagMestreRequest $request, TagMestre $tagMestre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TagMestre $tagMestre)
    {
        //
    }

    public function checkTag(Request $request){
        $tag = User::where('tag', $request->tag)->first();

        if($tag){
            return 'true';
        }

        return 'false';
    }
}
