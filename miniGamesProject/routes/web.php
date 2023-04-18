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
    return view('login');
});
Route::get('/register', function () {
    return view('login');
});

Route::get('/home', [GameController::class, 'getAllGames']);
Route::get('/game/{game?}', [GameController::class, 'game'])->name('game');
Route::get('/ranking/{game?}', function($game) {
    return view('ranking', ['game' => $game]);
});
Route::get('/get_ranking_game', 'App\Http\Controllers\MatchController@getBestMatchesByIdGame')->name('ranking');


Route::post('/save-points', 'App\Http\Controllers\MatchController@savePoints');


