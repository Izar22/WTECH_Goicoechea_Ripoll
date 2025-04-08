<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CartController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;

Route::get('/sign_in', function () {
    return view('LoginPage');
})->name('sign_in');

Route::get('/', [GameController::class, 'sliders'])->name('landing_page');

Route::get('/categorized_games', [GameController::class, 'categorizedGames'])->name('categorized_games');

Route::get('/game_details/{id}', [GameController::class, 'gameDetails'])->name('game_details');

Route::get('/shopping_cart', [CartController::class, 'showCart'])->name('shopping_cart');

Route::post('/shopping_cart', [CartController::class, 'addToCart'])->name('shopping_cart_post');

Route::post('/shopping_cart_now', [CartController::class, 'shopNow'])->name('shopping_cart_now');

Route::post("/log_in", [UserController::class, "logIn"]);

Route::post("/sign_up", [UserController::class, "signUp"]);

Route::post("/log_out", [UserController::class, "logOut"]);


