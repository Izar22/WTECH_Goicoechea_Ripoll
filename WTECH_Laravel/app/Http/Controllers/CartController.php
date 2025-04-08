<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingCart;
use App\Models\GameShoppingCart;
use App\Models\Game;
use Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $gameId = $request->game_id; 
        $quantity = $request->quantity; 

        $user = Auth::user();
        if (!$user) {
            $shoppingCart = ShoppingCart::create();
        }

        $shoppingCart = ShoppingCart::where('customer_id', $user->id)->first();

        if (!$shoppingCart) {
            $shoppingCart = ShoppingCart::create([
                'customer_id' => $user->id
            ]);
        }
    
        $existingItem = GameShoppingCart::where('cart_id', $shoppingCart->id)
                                ->where('game_id', $gameId)
                                ->first();
    
        if ($existingItem) {
            $existingItem->quantity += $quantity;
            $existingItem->save();
        } else {
            GameShoppingCart::create([
                'cart_id' => $shoppingCart->id,
                'game_id' => $gameId,
                'quantity' => $quantity
            ]);
        }

        return redirect()->route('game_details', ['id' => $gameId])->with('success', 'Game added to the cart!');
    }

    public function goCart(Request $request)
    {
        return view('ShoppingCart');
    }

    public function showCart()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tu carrito.');
        }

        $shoppingCart = ShoppingCart::where('customer_id', $user->id)->first();

        if (!$shoppingCart) {
            return view('shopping_cart', ['items' => []]);
        }

        $items = GameShoppingCart::with('game')
            ->where('cart_id', $shoppingCart->id)
            ->get();

        return view('ShoppingCart', ['items' => $items]);
    }
}
