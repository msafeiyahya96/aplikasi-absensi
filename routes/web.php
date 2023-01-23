<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/login', [LoginController::class, 'loginPage'])->name('login');
Route::post('/postLogin', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'ceklevel:admin,karyawan'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/registrasi', [LoginController::class, 'registrasi'])->name('registrasi');
    Route::post('/createRegistrasi', [LoginController::class, 'createRegistrasi'])->name('createRegistrasi');
});