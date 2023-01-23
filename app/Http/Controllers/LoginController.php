<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginPage() {
        return view('login.login-aplikasi');
    }

    public function postLogin(Request $request) {
        if(Auth::attempt($request->only('email', 'password'))) {
            return redirect('home');
        }
        return redirect('index');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
