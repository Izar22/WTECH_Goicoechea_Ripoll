<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminGameController extends Controller
{
    public function showAddGame()
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin_login_form');
        }
        return view('AddGame');  
    }

    public function showEditGame($id)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin_login_form');
        }
        $game = Game::findOrFail($id); 

        return view('EditGame', compact('game')); 
    }

    public function editGame(Request $request, $id)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin_login_form');
        }

        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'publisher_name'=> 'required|string|max:255',
            'platform'      => 'required|string|max:255',
            'region'        => 'required|string|max:255',
            'genre'         => 'required|string|max:255',
            'category'      => 'required|in:Short games,Long games,Pixel art,Open world',
            'release_date'  => 'required|date',
            'description'    => 'required|string',
            'price'         => 'required|numeric|min:0.01',
        ]);

        $game = Game::findOrFail($id);
        $game->update($request->all());
        
        return redirect()->route('admin_categorized_games');
    }

    public function destroy($id)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin_login_form');
        }
        $game = Game::findOrFail($id);
        $game->delete();

        return response()->json(['success' => true]);
    }
    
    public function categorizedGames(Request $request)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin_login_form');
        }
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
        $games = $games->with('images')->paginate(10);

        return view('AdminCategorizedGames', compact('games', 'genres', 'platforms', 'totalGames'));
    }
}
