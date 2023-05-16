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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {
    
    Route::get('/perfil', function () {
        return view('perfil');
    });
    
    Route::get('/home', [GameController::class, 'getAllGames']);
    Route::get('/game/{game?}', [GameController::class, 'game'])->name('game');
    Route::get('/ranking/{game?}', function($game) {
        return view('ranking', ['game' => $game]);
    });
    Route::get('/get_ranking_game', 'App\Http\Controllers\MatchController@getBestMatchesByIdGame')->name('ranking');
    Route::get('/countTodayMatches', 'App\Http\Controllers\MatchController@countTodayMatches')->name('countMatches');    
    
    Route::post('/save-points', 'App\Http\Controllers\MatchController@savePoints');
    
    Route::get('/admin', [App\Http\Controllers\UserController::class, 'index'])->name('admin');
    Route::get('/session', function () {
        return session()->all();
    });
    
    Route::get('/users/{id}', function ($id) {
        $user = App\Models\User::find($id);
        return $user;
    });
});

