<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;

/*
GET - Request a resource
POST - Create a new resource
PUT - Update a resource (everything)
PATCH - Update a resource (partial update)
DELETE - Delete a resource
OPTIONS - Get the supported HTTP methods
*/

Route::get('/', [PostController::class,'index'])->name('index');

Route::get('home', [HomeController::class,'index']) ->name('home'); 



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

