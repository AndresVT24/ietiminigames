<?php

namespace App\Http\Controllers;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController
{
    public function getAllGames()
    {
        $games = Game::all();
        
        return view('home', ['games' => $games,]);
    }

    public function game(Request $request)
    {
        $game = Game::findOrFail($request->game);
        session(['game_name' => $game->name]);
        session(['game_id' => $game->id]);
        return view('game');
    }
}