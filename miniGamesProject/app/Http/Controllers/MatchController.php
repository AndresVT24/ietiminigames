<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatchController extends Controller
{
    public function savePoints(Request $request)
    {
        $puntos = $request->input('puntuacion');
        $game = $request->input('game');

        DB::table('matches')->insert([
            'game_id' => session('game_id'),
            'user_id' => 1,
            'points' => $puntos
        ]);
    }

    public function getBestMatchesByIdGame(){
        $id_game = session('game_id');

        $matches = DB::table('matches')
                    ->where('game_id', $id_game)
                    ->orderByDesc('points')
                    ->get();
    
        return response()->json($matches);
    }
}