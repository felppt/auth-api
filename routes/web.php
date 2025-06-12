<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

Route::redirect('/', '/registration');

Route::get('/registration', function() {
    return view('registration.index');
})->name('registration');

Route::post('registration', [RegisterController::class, 'store'])->name('registration.store');

Route::get('/login', function() {
    return view('login.index');
})->name('login');

Route::post('login', [LoginController::class, 'store'])->name('login.store');




Route::get('/tasks', [TasksController::class, 'index'])->name('tasks');

Route::get('/logs', function() {
    return view('logs.index');
})->name('logs');

Route::get('/orders', function() {
    return view('orders.index');
})->name('orders');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Route::middleware('auth')->get('health', \Spatie\Health\Http\Controllers\HealthCheckJsonResultsController::class);

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
