<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

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
        $game = Game::with('images')->findOrFail($id);

        return view('GameDetails', compact('game'));
    }

    public function categorizedGames(Request $request)
    {
        $category = $request->query('category');
        $orderBy = $request->query('order_by');
        $genre = $request->query('genre');
        $platform = $request->query('platform');
        $fromPrice = $request->query('fromPrice');
        $toPrice = $request->query('toPrice');
        $search = $request->query('search');

        $genres = Game::select('genre')->distinct()->get();
        $platforms = Game::select('platform')->distinct()->get();

        $games = Game::query();
        if ($search) {
            $games = $games->where('title', 'LIKE', '%' . $search . '%');
        }

        if ($genre) {
            $games = $games->where('genre', $genre);
        }

        if ($platform) {
            $games = $games->where('platform', $platform);
        }

        if ($fromPrice !== null && $toPrice !== null) {
            $min = min($fromPrice, $toPrice);
            $max = max($fromPrice, $toPrice);
        
            $games = $games->whereBetween('price', [$min, $max]);
        } else {
            if ($fromPrice !== null) {
                $games = $games->where('price', '>=', $fromPrice);
            }
            if ($toPrice !== null) {
                $games = $games->where('price', '<=', $toPrice);
            }
        }

        if ($orderBy == 'price_increasing') {
            $games = $games->orderBy('price', 'asc');
        } elseif ($orderBy == 'price_decreasing') {
            $games = $games->orderBy('price', 'desc');
        }
        $totalGames = $games->count();

        //$games = $games->paginate(10);
        $games = $games->with('images')->paginate(10);

        return view('CategorizedGames', compact('games', 'category', 'genres', 'platforms', 'totalGames'));
    }
}
