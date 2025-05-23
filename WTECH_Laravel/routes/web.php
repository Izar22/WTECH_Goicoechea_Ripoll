<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminGameController;

Route::get('/sign_in', function () {
    return view('LoginPage');
})->name('sign_in');

Route::get('/', [GameController::class, 'sliders'])->name('landing_page');

Route::get('/categorized_games', [GameController::class, 'categorizedGames'])->name('categorized_games');

Route::get('/game_details/{id}', [GameController::class, 'gameDetails'])->name('game_details');

Route::get('/shopping_cart', [CartController::class, 'showCart'])->name('shopping_cart');

Route::post('/shopping_cart', [CartController::class, 'addToCart'])->name('shopping_cart_post');

Route::post('/shopping_cart_now', [CartController::class, 'shopNow'])->name('shopping_cart_now');

Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart_updateQuantity');

Route::post('/cart/delete/{id}', [CartController::class, 'delete'])->name('cart_delete');

Route::post('/process_shipping', [CartController::class, 'process'])->name('process_shipping');

Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout_store');

Route::post("/log_in", [UserController::class, "logIn"]);

Route::post("/sign_up", [UserController::class, "signUp"]);

Route::post("/log_out", [UserController::class, "logOut"]);

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin_login_form');

Route::post('/admin/login', [AdminController::class, 'logIn'])->name('admin_login');

Route::post('/admin/logout', [AdminController::class, 'logOut'])->name('admin_logout');

Route::get('/admin/add_game', [AdminGameController::class, 'showAddGame'])->name('admin_show_add_game');

Route::post('/admin/add_game', [AdminGameController::class, 'addGame'])->name('admin_add_game');

Route::delete('/admin/games/{id}', [AdminGameController::class, 'destroy'])->name('admin_games_destroy');

Route::get('/admin/edit_game/{id}', [AdminGameController::class, 'showEditGame'])->name('admin_edit_game');

Route::put('/admin/edit_game/{id}', [AdminGameController::class, 'editGame'])->name('admin_edit_game_put');

Route::get('/admin/categorized_games', [AdminGameController::class, 'categorizedGames'])->name('admin_categorized_games');


