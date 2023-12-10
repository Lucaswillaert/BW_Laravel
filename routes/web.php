<?php

use App\Http\Controllers\about;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//view route van about [/locatiedirectory , naam(zonder.php)]
//als je een controller hebt --> [controller::class,'methode']
//php artisan serve --> om te starten 

//rootroute dat naar pagina welcome.blade.php


/*
GET - Request a resource
POST - create a resource
PUT - Update a resource
PATCH - modify a resource (partial update that has been changed)
DELETE - Delete a resource
OPTIONS - ask for information about the communication options available
*/
Route::get('/', function () {

    return view('welcome');
});
 
//testroute voor about 
//Route::get('/about',[AboutController::class,'index']);
//defined de methode index van de controller AboutController
Route::resource('about', AboutController::class);
// defined alle methodes van de controller in 1 keer






