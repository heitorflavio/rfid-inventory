<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function Auth(Request $request){
         
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/dashboard');
        } else {
            // Login falhou, exibir mensagem de erro
            return redirect()->back()->withErrors(['login' => 'Credenciais inválidas, tente novamente.']);
        }
    }

    public function Logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
