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

        return redirect()->back();
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

        $users = User::where('id', $id)->first();

        $users->update([
            'name' => $request->name,
            'password' =>  bcrypt($request->password),
            'tag' => $request->tag,
        ]);

        return redirect()->back();
    }


    
}
