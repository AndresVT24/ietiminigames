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
            'game_id' => 1,
            'user_id' => 1,
            'points' => $puntos
        ]);

    }
}