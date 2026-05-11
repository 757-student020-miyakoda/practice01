<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

// STEP4オプション問題用
Route::get('/profile/edit', [HomeController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/update', [HomeController::class, 'update'])->name('profile.update');

// STEP5オプション問題用
Route::delete('/users/delete', [HomeController::class, 'destroy'])->name('users.delete');

// LV40用
Route::resource("messages",App\Http\Controllers\MessageController::class);