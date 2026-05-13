<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){//LV50のSTEP1
Route::get('/home', [HomeController::class, 'index'])->name('home');

// STEP4オプション問題用
Route::get('/profile/edit', [HomeController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/update', [HomeController::class, 'update'])->name('profile.update');

// STEP5オプション問題用
Route::delete('/users/delete', [HomeController::class, 'destroy'])->name('users.delete');

// LV50 STEP5 129ページ
Route::resource("likes",App\Http\Controllers\LikeController::class);
//次はmessages/messages.blade.phpでイイネボタンを表示させる

});
// LV40用
Route::resource("messages",App\Http\Controllers\MessageController::class);