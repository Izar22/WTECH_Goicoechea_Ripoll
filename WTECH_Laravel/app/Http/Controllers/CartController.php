<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Game;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use App\Models\ShippingDetail;
use App\Models\GameShoppingCart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $gameId = $request->game_id; 
        $quantity = $request->quantity; 

        $user = Auth::user();
        $shoppingCart = null;

        if ($user) {
            $shoppingCart = ShoppingCart::where('customer_id', $user->id)->first();

            if (!$shoppingCart) {
                $shoppingCart = ShoppingCart::create([
                    'customer_id' => $user->id
                ]);
            }
        } else {
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

        return redirect()->route('game_details', ['id' => $gameId])
                        ->with('success', 'Game added to shopping cart!');
    }

    public function shopNow(Request $request)
    {
        $gameId = $request->game_id; 
        $quantity = $request->quantity; 

        $user = Auth::user();
        $shoppingCart = null;

        if ($user) {
            $shoppingCart = ShoppingCart::where('customer_id', $user->id)->first();

            if (!$shoppingCart) {
                $shoppingCart = ShoppingCart::create([
                    'customer_id' => $user->id
                ]);
            }
        } else {
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

        return redirect()->route('shopping_cart')->with('success', 'Game added to shopping cart!');
    }

    public function showCart()
    {
        $user = Auth::user();
        $shoppingCart = null;

        if ($user) {
            $shoppingCart = ShoppingCart::where('customer_id', $user->id)->first();

            if (!$shoppingCart) {
                $shoppingCart = ShoppingCart::create([
                    'customer_id' => $user->id
                ]);
            }
        } else {
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

        if (!$shoppingCart) {
            return view('ShoppingCart', ['items' => []]);
        }

        $items = GameShoppingCart::with('game')
            ->where('cart_id', $shoppingCart->id)
            ->get();

        return view('ShoppingCart', ['items' => $items]);
    }

    public function updateQuantity(Request $request)
    {
        $itemId = $request->input('item_id');
        $action = $request->input('action'); 

        $item = GameShoppingCart::find($itemId);

        if (!$item) {
            return response()->json(['error' => 'Item not founded'], 404);
        }

        if ($action === 'increase') {
            $item->quantity += 1;
        } elseif ($action === 'decrease' && $item->quantity > 1) {
            $item->quantity -= 1;
        }

        $item->save();

        $item->load('game');

        return response()->json([
            'success' => true,
            'new_quantity' => $item->quantity,
            'total_price' => number_format($item->quantity * $item->game->price, 2)
        ]);
    }

    public function delete($id)
    {
        $item = GameShoppingCart::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Item removed from cart.');
    }
}
