<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function recommendations()
    {
        $games = Game::select('title as name')->get();
        return view('LandingPage', compact('games'));
    }

    public function categorizedGames(Request $request)
    {
        $category = $request->query('category');
        $orderBy = $request->query('order_by');
        $genre = $request->query('genre');
        $platform = $request->query('platform');
        $fromPrice = $request->query('fromPrice');
        $toPrice = $request->query('toPrice');

        // Obtener valores únicos de género y plataforma
        $genres = Game::select('genre')->distinct()->get();
        $platforms = Game::select('platform')->distinct()->get();

        $games = Game::query();

        // Aplicar filtros de género
        if ($genre) {
            $games = $games->where('genre', $genre);
        }

        // Aplicar filtros de plataforma
        if ($platform) {
            $games = $games->where('platform', $platform);
        }

        // Filtro de precio
        if ($fromPrice) {
            $games = $games->where('price', '>=', $fromPrice);
        }
        if ($toPrice) {
            $games = $games->where('price', '<=', $toPrice);
        }

        // Ordenar por precio
        if ($orderBy == 'price_increasing') {
            $games = $games->orderBy('price', 'asc');
        } elseif ($orderBy == 'price_decreasing') {
            $games = $games->orderBy('price', 'desc');
        }
        $totalGames = $games->count();

        $games = $games->paginate(10);

        return view('CategorizedGames', compact('games', 'category', 'genres', 'platforms', 'totalGames'));
    }
}
