<?php

namespace App\Http\Controllers;

use App\Models\Game;

class GameController extends Controller
{
    public function sliders()
    {
        $games_recomended = Game::select('title', 'id')->limit(8)->get();
        $games_popular = Game::select('title')->inRandomOrder()->limit(8)->get();
        return view('LandingPage', compact('games_recomended', 'games_popular'));
    }

    public function gameDetails($id)
    {
        $game = Game::findOrFail($id);

        return view('GameDetails', compact('game'));
    }

}
