<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TvController;
 use App\Exceptions\MovieNotFoundException;


Route::get('/',[MovieController::class,'index'])->name('movie.index');

Route::get('/details/{id}', [MovieController::class, 'show']);

Route::view('/ActorsPage','getAllActors');

Route::get('/castPage/{id}',[MovieController::class,'castPage']);

Route::get('/ActorsPage',[MovieController::class,'getAllActors']);

Route::get('/Tvshow',[TvController::class,'index']);
Route::get('/Tvshow/{id}', [TvController::class, 'Tvdetails']);

// Route::get('/details/{id}',[MovieController::class,'showDetails']);

// Route::get('/', function () {
//     return view('index');
// });

// Route::view('/details','detail');
