<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;


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

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/register', function () {
    return view('auth/register');
});

Route::get('/perfil', function () {
    return view('perfil');
});

Route::get('/game/{game?}', [GameController::class, 'game'])->name('game');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//ADMINPANEL
Route::get('/admin', [App\Http\Controllers\UserController::class, 'infoUsers'])->name('admin');

Route::get('/userFind/{id}', [App\Http\Controllers\UserController::class, 'findUser'])->name('findUser');

Route::put('/userEdit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');

Route::delete('/userDelete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('delete');

Route::get('/admin/games',[GameController::class, 'infoGames']) ->name('adminGames');

Route::delete('/gameDelete/{id}', [GameController::class, 'delete'])->name('delete');
//FIN ADMINPANEL
Auth::routes();