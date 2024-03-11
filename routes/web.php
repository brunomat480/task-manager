<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

Route::resource('users', UserController::class);
Route::resource('tasks', TaskController::class);

Route::get('/', [AppController::class, 'index'])->name('app.home')->middleware('auth');
Route::get('/categorie/{id}', [AppController::class, 'categorie'])->name('app.categorie');

Route::get('/delete/{id}', [TaskController::class, 'destroy'])->name('task.delete');
Route::post('/edit/{id}', [TaskController::class, 'edit'])->name('task.edit');

Route::view('/signIn', 'auth.sign-in')->name('auth.signin');
Route::get('/signUp', [AuthController::class, 'create'])->name('auth.signup');

Route::post('/auth', [AuthController::class, 'auth'])->name('auth.authenticate');
Route::get('/logOut', [AuthController::class, 'logOut'])->name('auth.logout');
