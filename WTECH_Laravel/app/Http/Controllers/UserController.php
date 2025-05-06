<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function logIn(Request $request){
        $incomingFields = $request->validate([
            'loginemail' => ['required'],
            'loginpassword' => ['required', "min:8"]
        ]);

        if (auth()->attempt(["email" => $incomingFields["loginemail"], "password" => $incomingFields["loginpassword"]])) {
            $request->session()->regenerate();
            return redirect("/");
        }
        return back()->withErrors(['login_error' => 'Mail or password are not correct'])->withInput();
    }

    public function signUp(Request $request){
        $incomingFields = $request->validate([
            'name' => ['required', "max:20"],
            'email' => ['required', Rule::unique('users','email')],
            'password' => ['required', "min:8"],
            'password2' => ['required', "min:8"]
        ]);

        if ($incomingFields['password'] !== $incomingFields['password2']) {
            return back()
                ->withErrors(['password_mismatch' => 'Passwords do not match'])
                ->withInput();
        }

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        unset($incomingFields["password2"]);
        unset($incomingFields['name']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/');
    }

    public function logOut(){
        auth()->logout();
        return redirect()->back();
    }
}
