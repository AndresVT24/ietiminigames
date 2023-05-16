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

    public function findGame($id)
    {
        $game= Game::find($id);
        if ($game) {
            return response()->json(['success' => true, 'gameInfo' => $game]);
        } else {
            return response()->json(['success' => false, 'message' => 'El juego no se encontró.']);
        }
    }

    public function edit(Request $request, $id)
    {
        $game = Game::findOrFail($id);
        if ($game) {
            $game->name = $request->name;
            $game->description = $request->description;
            $game->status = $request->status;
            $game->save();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'El juego no se ha podido editar.']);
        }
    }
}