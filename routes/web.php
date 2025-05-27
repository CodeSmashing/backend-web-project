<?php

use App\Http\Controllers\ThreadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/help', [HelpController::class, 'index'])
    ->name('help');

Route::get('/stylesheet', function () {
    return view('stylesheet');
})->name('stylesheet');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

Route::get('/discussion-board', function () {
    return view('discussion-board');
})->name('discussion');

// Thread
Route::get('/discussion-board/thread/{thread}', [ThreadController::class, 'show'])
    ->name('discussion.thread');

Route::patch('/discussion-board/thread/update/{thread}', [ThreadController::class, 'update'])
    ->name('thread.update');

Route::post('/discussion-board/thread/store/', [ThreadController::class, 'store'])
    ->name('thread.store');

Route::delete('/discussion-board/thread/destroy/{thread}', [ThreadController::class, 'destroy'])
    ->name('thread.destroy');

Route::delete('/discussion-board/thread/delete/{thread}', [ThreadController::class, 'delete'])
    ->name('thread.delete');

Route::post('/discussion-board/thread/report/{thread}', [ThreadController::class, 'report'])
    ->name('thread.report');

// Post
Route::patch('/discussion-board/post/update/{post}', [PostController::class, 'update'])
    ->name('post.update');

Route::post('/discussion-board/post/store', [PostController::class, 'store'])
    ->name('post.store');

Route::delete('/discussion-board/post/destroy/{post}', [PostController::class, 'destroy'])
    ->name('post.destroy');

Route::delete('/discussion-board/post/delete/{post}', [PostController::class, 'delete'])
    ->name('post.delete');

Route::post('/discussion-board/post/report/{post}', [PostController::class, 'report'])
    ->name('post.report');

require __DIR__ . '/auth.php';
