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
    
    Route::get('/users/{id}', function ($id) {
        $user = App\Models\User::find($id);
        return $user;
    });

    //PERFIL
    Route::get('/userFindProfile/{id}', [App\Http\Controllers\UserController::class, 'findUserProfile'])->name('findUserProfile');
    Route::put('/userEditPerfil/{id}', [App\Http\Controllers\UserController::class, 'editPerfil'])->name('editPerfil');

    //PERFIL DE USUARIOS
    Route::get('/perfil/{nick_name}',  [App\Http\Controllers\PerfilController::class, 'show'])->name('show');

});

Route::group(['middleware' => \App\Http\Middleware\AdminMiddleware::class], function () {
    //ADMINPANEL
    //USERS
    Route::get('/admin', [App\Http\Controllers\UserController::class, 'infoUsers'])->name('admin');
    Route::get('/userFind/{id}', [App\Http\Controllers\UserController::class, 'findUser'])->name('findUser');
    Route::put('/userEdit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');
    Route::delete('/userDelete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('delete');

    //JUEGOS
    Route::get('/admin/games',[GameController::class, 'infoGames']) ->name('adminGames');
    Route::delete('/gameDelete/{id}', [GameController::class, 'delete'])->name('delete');
    Route::get('/gameFind/{id}', [App\Http\Controllers\GameController::class, 'findGame'])->name('findGame');
    Route::put('/gameEdit/{id}', [App\Http\Controllers\GameController::class, 'edit'])->name('edit');
    //FIN ADMINPANEL
});
/*
Auth::routes();
*/