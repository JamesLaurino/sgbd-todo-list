<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use  \App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/tasks', [TaskController::class, 'index'])
    ->name("task.index")
    ->middleware('auth');

Route::post('/task', [TaskController::class, 'store'])
    ->name("task.store")
    ->middleware('auth');

Route::delete('/task/{id}', [TaskController::class, 'destroy'])
    ->name("task.destroy")
    ->middleware('auth');

require __DIR__.'/auth.php';
