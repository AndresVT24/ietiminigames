<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Matches;

class MatchController extends Controller
{
    public function savePoints(Request $request)
    {
        $puntos = $request->input('puntuacion');
        $game = $request->input('game');

        DB::table('matches')->insert([
            'game_id' => session('game_id'),
            'user_id' => session('idUser'),
            'points' => $puntos,
            'created_at' => now() // Agrega la fecha y hora actuales
        ]);
    }

    public function getBestMatchesByIdGame(){
        $id_game = session('game_id');

        $matches = DB::table('matches')
            ->leftJoin('users', 'matches.user_id', '=', 'users.id')
            ->where('game_id', $id_game)
            ->orderByDesc('points')
            ->select('matches.*', 'users.name as user_name')
            ->take(10)
            ->get();
    
        return response()->json($matches);
    }

    public function countTodayMatches(){
        $userRol = auth()->user()->rol; // Obtiene el id del usuario actualmente autenticado
        if($userRol == 'Vip'){
            $matchesPlayedToday = -1;
        }else{
            $userId = auth()->user()->id; // Obtiene el id del usuario actualmente autenticado        
            $today = Carbon::today(); // Obtiene la fecha actual
            $matchesPlayedToday = Matches::where('user_id', $userId)
                                        ->whereDate('created_at', $today)
                                        ->count();
        }
        return response()->json($matchesPlayedToday);
    }
}