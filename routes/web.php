<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', function () { // Abre o login no root
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Produtos
Route::controller(App\Http\Controllers\ProdutoController::class)
->prefix('produtos')
->name('produtos.')
->group(function () {
    Route::get('/list', 'index')->name('list');
    Route::get('/create', 'create')->name('create');
    Route::post('/register', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/edit/{id}', 'update')->name('update');
});
// Categorias
Route::controller(App\Http\Controllers\CategoriaController::class)
->prefix('categorias')
->name('categorias.')
->group(function () {
    Route::get('/list', 'index')->name('list');
    Route::get('/create', 'create')->name('create');
    Route::post('/register', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/edit/{id}', 'update')->name('update');
});
// Marcas
Route::controller(App\Http\Controllers\MarcaController::class)
->prefix('marcas')
->name('marcas.')
->group(function () {
    Route::get('/list', 'index')->name('list');
    Route::get('/create', 'create')->name('create');
    Route::post('/register', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/edit/{id}', 'update')->name('update');
});
// Marcas
Route::controller(App\Http\Controllers\UserController::class)
->prefix('usuarios')
->name('usuarios.')
->group(function () {
    Route::get('/list', 'index')->name('list');
    Route::get('/create', 'create')->name('create');
    Route::post('/register', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/edit/{id}', 'update')->name('update');
});
// Tipo de usuarios
Route::controller(App\Http\Controllers\TypeUserController::class)
->prefix('typeusers')
->name('typeusers.')
->group(function () {
    Route::get('/list', 'index')->name('list');
    Route::get('/create', 'create')->name('create');
    Route::post('/register', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/edit/{id}', 'update')->name('update');
});
// Privilegios
Route::controller(App\Http\Controllers\PrivilegioController::class)
->prefix('privilegios')
->name('privilegios.')
->group(function () {
    Route::get('/list', 'index')->name('list');
    Route::get('/create', 'create')->name('create');
    Route::post('/register', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/edit/{id}', 'update')->name('update');
});
