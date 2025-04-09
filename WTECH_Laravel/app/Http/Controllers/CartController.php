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
        $shoppingCart = null;

        if ($user) {
            // Usuario logueado: buscar su carrito
            $shoppingCart = ShoppingCart::where('customer_id', $user->id)->first();

            if (!$shoppingCart) {
                $shoppingCart = ShoppingCart::create([
                    'customer_id' => $user->id
                ]);
            }
        } else {
            // Invitado: buscar carrito por sesión
            $cartId = session()->get('cart_id');
            
            if ($cartId) {
                $shoppingCart = ShoppingCart::where('id', $cartId)->first();
            }

            if (!$shoppingCart) {
                $shoppingCart = ShoppingCart::create([
                    'customer_id' => null
                ]);
                session()->put('cart_id', $shoppingCart->id);
            }
        }

        // Verificar si el juego ya está en el carrito
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

        return redirect()->route('game_details', ['id' => $gameId])
                        ->with('success', '¡Juego agregado al carrito!');
    }

    public function shopNow(Request $request)
    {
        $gameId = $request->game_id; 
        $quantity = $request->quantity; 

        $user = Auth::user();
        $shoppingCart = null;

        if ($user) {
            // Si el usuario está logueado, buscamos su carrito
            $shoppingCart = ShoppingCart::where('customer_id', $user->id)->first();

            if (!$shoppingCart) {
                $shoppingCart = ShoppingCart::create([
                    'customer_id' => $user->id
                ]);
            }
        } else {
            // Si no está logueado, buscamos carrito por sesión
            $cartId = session()->get('cart_id');
            
            if ($cartId) {
                $shoppingCart = ShoppingCart::where('id', $cartId)->first();
            }

            if (!$shoppingCart) {
                $shoppingCart = ShoppingCart::create([
                    'customer_id' => null
                ]);
                session()->put('cart_id', $shoppingCart->id);
            }
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

        return redirect()->route('shopping_cart')->with('success', '¡Juego agregado al carrito!');
    }

    public function showCart()
    {
        $user = Auth::user();

        if ($user) {
            $shoppingCart = ShoppingCart::where('customer_id', $user->id)->first();

            if (!$shoppingCart) {
                return view('ShoppingCart', ['items' => []]);
            }
        } else {
            $cartId = session()->get('cart_id');

            if ($cartId) {
                $shoppingCart = ShoppingCart::where('id', $cartId)->first();
            } else {
                $shoppingCart = ShoppingCart::create([
                    'customer_id' => null, 
                ]);
                session()->put('cart_id', $shoppingCart->id);
            }
        }

        $items = GameShoppingCart::with('game')
            ->where('cart_id', $shoppingCart->id)
            ->get();

        return view('ShoppingCart', ['items' => $items]);
    }
}
