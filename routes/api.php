<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('books', BookController::class);
Route::get('books', [BookController::class, 'apiGetBooks'])->name('apiGetBooks');
Route::post('books/store', [BookController::class, 'store'])->name('apiStoreBooks');
Route::post('books/{kode}', [BookController::class, 'update'])->name('apiUpdateBooks');
Route::post('books/{kode}', [BookController::class, 'destroy'])->name('apiDestroyBooks');

Route::prefix('admin')->middleware('theme:admin')->name('admin.')->group(function() {
    Route::middleware(['guest:admin'])->group(function () {
        Route::view('/login', 'auth.login')->name('login');
        Route::post('/login', [AuthController::class, 'store']);
    });
    
    Route::middleware(['auth:admin'])->group(function () {
    });
});