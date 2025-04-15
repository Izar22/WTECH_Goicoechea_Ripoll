<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\GameOrder;
use App\Models\OrderDetail;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use App\Models\PaymentDetail;
use App\Models\ShippingDetail;
use App\Models\GameShoppingCart;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'region' => 'required|string',
            'country' => 'required|string',
            'zip' => 'required|string',
            'cardholder_name' => 'required|string',
            'card_number' => 'required|digits:16',
            'expiration_date' => 'required',
            'CVV' => 'required|digits:3',
        ]);

        [$exp_month, $exp_year] = explode('/', $request->expiration_date);
        $exp_month = (int) $exp_month;
        $exp_year = 2000 + (int) $exp_year;

        DB::transaction(function () use ($request, $exp_month, $exp_year) {
            $shipping = ShippingDetail::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'region' => $request->region,
                'country' => $request->country,
                'zipcode' => $request->zip,
            ]);

            $payment = PaymentDetail::create([
                'card_number' => $request->card_number,
                'exp_month' => $exp_month,
                'exp_year' => $exp_year,
                'cvv' => $request->CVV,
            ]);

            $user = Auth::user();
            $shoppingCart = null;
            
            if ($user) {
                $shoppingCart = ShoppingCart::firstOrCreate([
                    'customer_id' => $user->id
                ]);
            } else {
                $cartId = session()->get('cart_id');
            
                if ($cartId) {
                    $shoppingCart = ShoppingCart::find($cartId);
                }
            
                if (!$shoppingCart) {
                    $shoppingCart = ShoppingCart::create([
                        'customer_id' => null
                    ]);
                    session()->put('cart_id', $shoppingCart->id);
                }
            }

            $cartItems = GameShoppingCart::with('game') 
                ->where('cart_id', $shoppingCart->id)
                ->get();

            $subtotal = $cartItems->sum(fn($item) => $item->Quantity * $item->game->Price);
            $shippingPrice = $subtotal * 0.10;
            $totalPrice = $subtotal + $shippingPrice;

            $order = OrderDetail::create([
                'payment_details_id' => $payment->id,
                'shipping_details_id' => $shipping->id,
                'customer_id' => auth()->id(),
                'total_price' => $totalPrice,
            ]);

            foreach ($cartItems as $item) {
                GameOrder::create([
                    'game_id' => $item->game_id,
                    'quantity' => $item->quantity,
                    'order_details_id' => $order->id,
                ]);
            }

            ShoppingCart::where('customer_id', auth()->id())->delete();
        });

        return redirect()->route('shopping_cart')->with('order_completed', true);
    }
}
