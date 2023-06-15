<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard',  [App\Http\Controllers\PainelController::class, 'dashboard']);
    Route::get('/produtos',  [App\Http\Controllers\PainelController::class, 'produtos'])->name('produtos');
  
    Route::get('/users',  [App\Http\Controllers\PainelController::class, 'users']);
    Route::get('/users/cadastro',  [App\Http\Controllers\PainelController::class, 'usersCadastro']);
    Route::post('/users/cadastro',  [App\Http\Controllers\UserController::class, 'store']);
    Route::get('/users/edita/{id}', [App\Http\Controllers\UserController::class, 'show']);
    Route::post('/users/edita/{id}', [App\Http\Controllers\UserController::class, 'update']);

    Route::get('/produtos/cadastro',  [App\Http\Controllers\PainelController::class, 'ProdutosCadastro']);
    Route::post('/produtos/cadastro',  [App\Http\Controllers\ProdutosController::class, 'store']);
    Route::get('/produtos/edita/{id}', [App\Http\Controllers\ProdutosController::class, 'show']);
    Route::post('/produtos/edita/{id}', [App\Http\Controllers\ProdutosController::class, 'update']);
    Route::get('/tags', [App\Http\Controllers\PainelController::class, 'tags']);
    Route::get('/', [App\Http\Controllers\PainelController::class, 'redirect']);
    Route::get('/produtos/estoque/{id}',  [App\Http\Controllers\PainelController::class, 'produtosEstoque']);
    Route::post('/produtos/estoque/{id}',  [App\Http\Controllers\EstoqueController::class, 'store']);
    Route::get('/relatorio', [App\Http\Controllers\PainelController::class, 'relatorio'] );
    Route::post('/deletar/tag/{id}',  [App\Http\Controllers\TagProdutosController::class, 'destroy']);
});


Route::get('/login', [App\Http\Controllers\PainelController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'Auth']);
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'Logout']);