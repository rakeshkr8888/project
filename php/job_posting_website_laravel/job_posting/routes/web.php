<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use Illuminate\http\Request;
use PhpParser\Node\Expr\FuncCall;

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

Route::get('/',[ListingController::class,"index"]);

Route::get('/show/{listing}',[ListingController::class,"show"]);

Route::get('/create',[ListingController::class,"create"])->middleware('auth');

Route::post('/create',[ListingController::class,"store"])->middleware('auth');

Route::get('/manage',[ListingController::class,"manage"])->middleware('auth');

Route::get('/edit/{job_id}',[ListingController::class,"edit"])->middleware('auth');

Route::put('/update/{job_id}',[ListingController::class,"update"])->middleware('auth');

Route::post('/delete/{job_id}',[ListingController::class,"delete"])->middleware('auth');

Route::get('/login',[UserController::class,"login"])->name('login')->middleware('guest');

Route::post('/authenticate',[UserController::class,"authenticate"]);

Route::get('/register',[UserController::class,"register"])->middleware('guest');

Route::post('/register',[UserController::class,"store"])->middleware('guest');

Route::post('/logout',[UserController::class,"logout"])->middleware('auth');