<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    public function registrasi() {
        return view('login.registrasi');
    }

    public function createRegistrasi(Request $request) {
        // dd($request->all());

        User::create([
            'name'              => $request->name,
            'level'             => 'karyawan',
            'email'             => $request->email,
            'password'          => bcrypt($request->password),
            'remember_token'    => Str::random(60)
        ]);

        return redirect(route('index'));
    }
}
