<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JournalController;
use App\Models\Journal;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;

/*
GET - Request a resource
POST - Create a new resource
PUT - Update a resource (everything)
PATCH - Update a resource (partial update)
DELETE - Delete a resource
OPTIONS - Get the supported HTTP methods
*/
//ROUTES VOOR POSTS
Route::get('/', [PostController::class,'index'])->name('index');

Route::get('posts', [PostController::class,'index']) ->middleware('auth') ->name('posts.index');

Route::get('posts/create', [PostController::class,'create']) ->middleware('auth') ->name('posts.create');

Route::post('posts', [PostController::class,'store']) ->middleware('auth') ->name('posts.store');

//ROUTES VOOR JOURNAL 
Route::get('journal.index', [JournalController::class,'index']) ->middleware('auth') ->name('journal.index');



//ROUTES VOOR ABOUT
Route::get('faq/index', [AboutController::class,'index']) ->middleware('auth') ->name('faq.index');




//ROUTES VOOR ADMIN
Route::get('admin/index', [AdminController::class,'index']) ->middleware('auth') ->name('admin.index');

//ROUTES VOOR PROFILE
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

