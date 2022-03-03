<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Anggota\AuthController;

Route::prefix('anggota')->middleware('theme:anggota')->name('anggota.')->group(function(){
    Route::middleware(['guest:anggota'])->group(function () {
        Route::view('/login', 'auth.login')->name('login');
        Route::post('/login', [AuthController::class, 'store']);
    });

    Route::middleware(['auth:anggota'])->group(function () {
        Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
        Route::view('/home', 'home')->name('home');
        Route::get('/userIndex', [App\Http\Controllers\BookController::class, 'userIndex'])->name('userIndex');
        Route::post('/storeOrder', [App\Http\Controllers\LoanController::class, 'store'])->name('storeOrder');
        Route::post('/orderBook', [App\Http\Controllers\LoanController::class, 'create'])->name('orderBook');
    });
});