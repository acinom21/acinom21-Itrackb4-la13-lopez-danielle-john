<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

// Part B: front page, not a resource controller
Route::get('/', [HomeController::class, 'index'])->name('home');

// These must come BEFORE the resource route, or /books/{book} intercepts them
Route::get('/books/feature', [BookController::class, 'feature'])
    ->name('books.feature');

// Kept so old bookmarks to /books/filter/{genre} don't 404.
Route::get('/books/filter/{genre?}', [BookController::class, 'redirectOldFilter'])
    ->name('books.filter');

Route::resource('books', BookController::class);

Route::get('/teachers/featured', [TeacherController::class, 'featured'])
     ->name('teachers.featured');

Route::resource('teachers', TeacherController::class)
     ->only(['index', 'show']);