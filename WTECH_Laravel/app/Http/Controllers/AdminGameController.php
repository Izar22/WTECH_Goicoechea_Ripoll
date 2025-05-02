<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Image;

use Illuminate\Http\Request;

class AdminGameController extends Controller
{
    public function showAddGame()
    {
        return view('AddGame');  
    }
    
    public function categorizedGames(Request $request)
    {
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

    public function addGame(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'release_date' => 'required|date',
            'publisher_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'platform' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpg,jpeg,png,gif,svg'
        ]);

        $game = Game::create($validated);

        // Manejar las imagenes
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $uploadedImage) {
                $filename = $uploadedImage->getClientOriginalName();
                $uploadedImage->move(public_path('uploaded'), $filename);

                $image = Image::create([
                    'path' => 'uploaded/' . $filename
                ]);

                $game->images()->attach($image->id);
            }
        }

        return redirect()->route('admin_categorized_games')->with('success', 'Game created successfully!');
    }
}
