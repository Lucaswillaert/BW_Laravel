<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JournalController;
use App\Models\Journal;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\Profile;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ContactController;
use App\Models\Contact;

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

//ROUTES COMMENTS/LIKES
Route::post('posts/{post}/comments', [CommentController::class,'store'])->name('comments.store');
Route::post('posts/{post}/like', [LikeController::class,'store'])->name('likes.store');

Route::post('/posts/{post}/likes', [App\Http\Controllers\PostController::class, 'like'])->name('posts.like');

//route voor het aanmaken van een entry
Route::get('journal.create', [EntryController::class,'create']) ->middleware('auth') ->name('journal.create');
//route voor het opslaan van een entry
Route::post('journal', [EntryController::class,'store']) ->middleware('auth') ->name('journal.store');
//route voor het openen van een entry 
Route::get('journal/{id}', [EntryController::class,'show']) ->middleware('auth') ->name('journal.show');

//ROUTES VOOR FAQ 
Route::get('faq', [FaqController::class, 'index']) -> name('faq.index');
//Routes voor het sturen van een question 
Route::post('faq', [FaqController::class, 'store'])->name('faq.store');

 //ROUTES VOOR ABOUT
Route::get('about', [AboutController::class,'index']) ->name('about.index');
//ROUTES VOOR CONTACT
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

//ROUTE VOOR PROFILE PAGE 
Route::get('profile/edit', [ProfileController::class,'edit']) ->middleware('auth')->name('profile.edit');

//ROUTES VOOR ADMIN
Route::get('admin/index', [AdminController::class,'index']) ->middleware('auth')->name('admin.index');
//delete quote door admin
Route::delete('admin/posts/{post}', [AdminController::class,'destroy'])->middleware('auth') ->name('posts.destroy');
//route contacts weer geven voor admin
Route::get('admin/contacts', [ContactController::class,'index'])->middleware('auth') ->name('admin.contacts');
//FAQ ADMIN PAGE SUBMISSION
Route::post('/faqs/{faq}/publish', [App\Http\Controllers\FaqController::class, 'publish'])->middleware('auth') ->name('faqs.publish');
//FAQ ADMIN ANSWERs 
Route::get('/faqs/{faq}/answer', [FaqController::class, 'answer'])->middleware('auth')->name('faqs.answer');
//FAQ ADMIN FAQ ANSWER SUBMISSION
Route::post('/faqs/{faq}/answer', [FaqController::class, 'storeAnswer'])->middleware('auth')->name('faqs.storeAnswer');
//FAQ ADMIN DELETE FAQ
Route::delete('/faqs/{faq}', [FaqController::class, 'destroy'])->middleware('auth')->name('faqs.destroy');
//logout
Route::post('auth/login', [LoginController::class,'logout'])->name('logout');

// Register routes
Route::get('register', [RegisterController::class,'view'])->name('register');
//opslaan van register
Route::post('register', [RegisterController::class,'register']);
//ROUTES VOOR LOGIN
Route::get('auth/login', [LoginController::class,'view']) ->middleware('auth') ->name('login.view');

//ROUTES VOOR ENTRIES 
Route::get('journal.index', [EntryController::class,'index']) ->middleware('auth') ->name('journal.index');
//storen van entries
Route::get('entries.create', [EntryController::class,'create']) ->middleware('auth') ->name('entries.create');
//opslaan van entries
Route::post('entries', [EntryController::class,'store']) ->middleware('auth') ->name('entries.store');
//showen van entries

//ROUTES VOOR PROFILE
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/profile/password/edit', [ProfileController::class, 'editPassword'])->name('password.edit');
});

require __DIR__.'/auth.php';

