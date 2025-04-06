<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/sign_in', function () {
    return view('LoginPage');
});

Route::get('/', function () {
    return view('LandingPage');
});


Route::post("/log_in", [UserController::class, "logIn"]);


Route::post("/sign_up", [UserController::class, "signUp"]);

Route::post("/log_out", [UserController::class, "logOut"]);
