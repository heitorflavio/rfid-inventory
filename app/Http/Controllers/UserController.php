<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;



class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return Inertia::render('user', ['user' => $users]);
    }

    public function store(StoreUsersRequest $request)
    {
        try {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'tag' => 'required',
        ]);

        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'tag' => $request->tag,
        ]);

        return Inertia::render('UsersCadastro', [
            'user' => auth()->user(), 'msg' => 'Usuário Cadastrado Com Sucesso']);
        }catch (\Exception $e) {
            return Inertia::render('UsersCadastro', [
                'user' => auth()->user(), 'error' => 'Erro ao Atualizar Produto: ' . $e]);
        }
    }

    public function show(User $users, $id)
    {
        $users = User::where('id', $id)->first();
        return Inertia::render('UsersEdita', [
            'users' => $users, 'user' => auth()->user(),
        ]);
    }

    public function update(UpdateUsersRequest $request, User $users, $id)
    {
        try{
        $users = User::where('id', $id)->first();

        if($users->password != $request->password){
            $users->update([
                'name' => $request->name,
                'password' =>  bcrypt($request->password),
                'tag' => $request->tag,
            ]);
        }else{
            $users->update([
                'name' => $request->name,
                'tag' => $request->tag,
            ]);
        }
        $users = User::where('id', $id)->first();
       
        return Inertia::render('UsersEdita', [
            'users' => $users, 'user' => auth()->user(), 'msg' => 'Usuário Cadastrado Com Sucesso']);
        }catch (\Exception $e) {
            return Inertia::render('UsersEdita', [
                'users' => $users, 'user' => auth()->user(), 'error' => 'Erro ao Atualizar Produto: ' . $e]);
        }
    }


    
}
