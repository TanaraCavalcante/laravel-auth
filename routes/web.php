<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//TODO adicionei um prefixo e agrupei as rotas de modo que somente quem està logado consegue visualizar a pagina
Route::middleware("auth")->prefix("/admin")->name("admin.")->group(function(){
Route::get('/project', [App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('index');
Route::get('/project/create', [App\Http\Controllers\Admin\ProjectController::class, 'create'])->name('create');
});