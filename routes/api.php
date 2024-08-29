<?php

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/admin', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum',AdminMiddleware::class);


Route::post('/loginuser', [AuthController::class, 'login'])->name('userlogin');

Route::prefix('v1/')->group(function () {

    Route::get('books', [BookController::class, 'index']);
    Route::post('books', [BookController::class, 'store']);
    Route::get('books/{id}', [BookController::class, 'show']);
    Route::post('books/{id}', [BookController::class, 'update']);
    Route::delete('books/{id}', [BookController::class, 'destroy']);
}); 
// Route::apiResource('books',BookController::class);
