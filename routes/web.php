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
    Route::get('/produtos',  [App\Http\Controllers\PainelController::class, 'produtos']);
    Route::get('/produtos/cadastro',  [App\Http\Controllers\PainelController::class, 'produtosCadastro']);
    Route::post('/produtos/cadastro',  [App\Http\Controllers\ProdutosController::class, 'store']);
    Route::get('/tags', [App\Http\Controllers\PainelController::class, 'tags']);
    Route::get('/', [App\Http\Controllers\PainelController::class, 'redirect']);
});


Route::get('/login', [App\Http\Controllers\PainelController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\aUTHController::class, 'Auth']);