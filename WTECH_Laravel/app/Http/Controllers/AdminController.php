<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('LoginAdmin');  
    }

    public function logIn(Request $request){

        $incomingFields = $request->validate([
            'email_login' => ['required', 'email'],
            'password_login' => ['required', "min:8"]
        ]);

        // Intentar autenticar usando el guard 'admin'
        if (Auth::guard('admin')->attempt([
            'email' => $incomingFields["email_login"],
            'password' => $incomingFields["password_login"]
        ])) {
            // Regenerar la sesión y redirigir
            $request->session()->regenerate();
            return redirect("/admin/categorized_games");
        }

        // Si las credenciales son incorrectas
        return redirect("/admin/login")->withErrors(['login_error' => 'User or password not correct']);
    }

    public function logOut()
    {
        Auth::guard('admin')->logout();
        return redirect("/");
    }

}
