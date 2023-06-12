<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard',  [App\Http\Controllers\PainelController::class, 'dashboard']);
    Route::get('/produtos',  [App\Http\Controllers\PainelController::class, 'produtos'])->name('produtos');
    Route::get('/produtos/cadastro',  [App\Http\Controllers\PainelController::class, 'produtosCadastro']);
    Route::post('/produtos/cadastro',  [App\Http\Controllers\ProdutosController::class, 'store']);
    Route::get('/produtos/edita/{id}', [App\Http\Controllers\ProdutosController::class, 'show']);
    Route::post('/produtos/edita/{id}', [App\Http\Controllers\ProdutosController::class, 'update']);
    Route::get('/tags', [App\Http\Controllers\PainelController::class, 'tags']);
    Route::get('/', [App\Http\Controllers\PainelController::class, 'redirect']);
    Route::get('/produtos/estoque/{id}',  [App\Http\Controllers\PainelController::class, 'produtosEstoque']);
    Route::post('/produtos/estoque/{id}',  [App\Http\Controllers\EstoqueController::class, 'store']);
    Route::get('/relatorio', [App\Http\Controllers\PainelController::class, 'relatorio'] );
    

});


Route::get('/login', [App\Http\Controllers\PainelController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'Auth']);
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'Logout']);