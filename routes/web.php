<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HelpController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/help', [HelpController::class, 'index'])
    ->name('help');

Route::get('/stylesheet', function () {
    return view('stylesheet');
})->name('stylesheet');

Route::get('/discussion-board', function () {
    return view('discussion-board');
})->name('discussion');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
