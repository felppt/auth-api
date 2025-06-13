<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\user\SettingsController;


Route::redirect('/', '/registration');


Route::middleware('guest')->group(function() {
    Route::get('/registration', function () {
        return view('registration.index');
    })->name('registration');

    Route::post('registration', [RegisterController::class, 'store'])->name('registration.store');

    Route::get('/login', function () {
        return view('login.index');
    })->name('login');

    Route::post('login', [LoginController::class, 'store'])->name('login.store');
});


Route::middleware(['auth', 'online'])->group(function() {
    Route::get('/tasks', [TasksController::class, 'index'])->name('tasks');


    Route::redirect('user', 'user/settings');
    Route::get('user/settings', [SettingsController::class, 'index'])->name('user.settings');

    Route::post('logout', [LogoutController::class, 'logout'])->name('logout');

    Route::get('/test', function() {
        return 'Test';
    });
});


Route::get('/logs', function() {
    return view('logs.index');
})->name('logs');

Route::get('/orders', function() {
    return view('orders.index');
})->name('orders');


Route::get('/tasks/category', [TasksController::class, 'getCategoryTasks'])->name('tasks.category');
Route::post('/tasks/set-complete', [TasksController::class, 'setComplete'])->name('tasks.setcomplete');

Route::get('/tasks', [TasksController::class, 'index'])->name('tasks');
Route::get('/tasks/create', [TasksController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TasksController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{id}/edit', [TasksController::class, 'edit'])->name('tasks.edit');
Route::get('/tasks/{id}', [TasksController::class, 'show'])->name('tasks.show');
Route::put('/tasks/{id}/update', [TasksController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{id}', [TasksController::class, 'delete'])->name('tasks.delete');


require __DIR__ . '/auth.php';
