<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::resource('users', UserController::class);

Route::get('/', [AppController::class, 'index'])->name('app.home');

Route::view('/signIn', 'auth.sign-in')->name('auth.signin');
Route::get('/signUp', [AuthController::class, 'create'])->name('auth.signup');
