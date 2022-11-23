<?php

use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Route;

// index page
Route::get('/', [CustomAuthController::class, "index"]);
Route::get('/home', [CustomAuthController::class, "dash"]);

// dashboard
Route::get('/dash', [CustomAuthController::class, "dash"])
    ->middleware('auth');

// register
Route::get('/register', [CustomAuthController::class, "register"])
    ->middleware('guest');

// custom register
Route::post('/customRegister', [CustomAuthController::class, "customRegister"])
    ->name('register.post')
    ->middleware('guest');

// logout
Route::get('/logout', [CustomAuthController::class, "logout"])
    ->middleware('auth');

// login
Route::get('/login', [CustomAuthController::class, 'login'])
    ->middleware('guest');

// authenticate login
Route::post('/login/authenticate', [CustomAuthController::class, 'loginAuth'])
    ->name('login.auth');


// admin page to authorized user only
Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/admin', function(){
        return view('mains.admin');
    })->name('adminDash');
});