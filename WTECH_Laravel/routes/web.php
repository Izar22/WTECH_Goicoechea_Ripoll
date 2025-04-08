<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;

Route::get('/sign_in', function () {
    return view('LoginPage');
})->name('sign_in');

Route::get('/', function () {
    return view('LandingPage');
})->name('landing_page');

Route::get('/categorized_games', [GameController::class, 'categorizedGames'])->name('categorized_games');

Route::get('/game_details', function (Request $request) {
    $name = $request->query('name');
    return view('GameDetails', ['name' => $name]);
})->name('game_details');

Route::get('/shopping_cart', function () {
    return view('ShoppingCart');
})->name('shopping_cart');

Route::post("/log_in", [UserController::class, "logIn"]);

Route::post("/sign_up", [UserController::class, "signUp"]);

Route::post("/log_out", [UserController::class, "logOut"]);


