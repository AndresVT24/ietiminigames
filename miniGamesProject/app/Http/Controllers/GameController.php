<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController
{
    public function game(Request $request)
{
    $game = $request->game;
    session(['game' => $game]);
    return view('game');
}
}