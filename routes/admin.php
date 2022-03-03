<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\UserController;

Route::prefix('admin')->middleware('theme:admin')->name('admin.')->group(function() {
    Route::middleware(['guest:admin'])->group(function () {
        Route::view('/login', 'auth.login')->name('login');
        Route::post('/login', [AuthController::class, 'store']);
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
        Route::get('/home', [LoanController::class, 'index'])->name('home');
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::post('/users/store', [UserController::class, 'store'])->name('storeUser');
        Route::post('/users/edit', [UserController::class, 'edit'])->name('editUser');
        Route::post('/users/update', [UserController::class, 'update'])->name('updateUser');
        Route::post('/users/destroy', [UserController::class, 'destroy'])->name('destroyUser');
    });
});