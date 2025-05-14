<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/registration', [AuthController::class, 'register'])->name('api.registration');

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/profile', [AuthController::class, 'profile'])->name('api.profile');
});
