<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentsController;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HealthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index']);
Route::get('/about',[HomeController::class,'about']);
/**  Google map api */
Route::get('/find',[HomeController::class,'find']);

/** Privacy pages*/
Route::get('/privacy',[HomeController::class,'privacy']);
Route::get('/terms',[HomeController::class,'terms']);



/**-------------   Contact page ----------------------------- */
Route::get('/contact',[ContactFormController::class,'create']);
//post request to send an contact email
Route::post('/contact',[ContactFormController::class,'store']);
// respond page after the email send will redirect to this page
Route::get('/contact/respond',[ContactFormController::class,'respond']);

/**------------------------ Profile pages ------------------------- */
Route::resource('/profile',ProfileController::class);

/**---------------------------Health pages ------------------------ */
Route::resource('/health',HealthController::class);


Route::resource('/posts',PostController::class);
Route::resource('/comment',CommentsController::class);






Auth::routes(['verify'=>true]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::post('/comment',[CommentsController::class,'store']);
