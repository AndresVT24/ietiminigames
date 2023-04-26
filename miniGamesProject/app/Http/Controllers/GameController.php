<?php

namespace App\Http\Controllers;
use App\Models\Game;

use Illuminate\Http\Request;

class GameController
{
    public function game(Request $request)
{
    $game = $request->game;
    session(['game' => $game]);
    return view('game');
}

    public function infoGames(){
        $games= Game::all();
        return view('adminGames', ['games' => $games]);
    }

    public function delete($id)
    {
        $game = Game::find($id);
        if ($game) {
            $game->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'El juego no se ha encontrado']);
        }
    }

}