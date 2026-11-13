<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\CategoryController;

// Homepage
Route::get('/', [AdController::class, 'index'])
    ->name('home');

// Advertisement CRUD routes
Route::resource('ads', AdController::class);

// Category CRUD routes
Route::resource('categories', CategoryController::class);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
