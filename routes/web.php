<?php
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


//rootroute dat naar pagina welcome.blade.php
Route::get('/', function () {
    return view('welcome');
});
 
//testroute voor about 
Route::get('/about',function(){
    return view('about');
});

//view route van about [/locatiedirectory , naam(zonder.php)]
Route::view('/about','about');