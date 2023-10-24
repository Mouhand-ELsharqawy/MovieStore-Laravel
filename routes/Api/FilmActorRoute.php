<?php

use App\Http\Controllers\FilmActorController;
use Illuminate\Support\Facades\Route;

Route::controller(FilmActorController::class)->group(function(){
    Route::get('/filmactor','index');
    Route::post('/filmactor','store');
    Route::get('/filmactor/{id}','show');
    Route::patch('/filmactor/{id}','update');
    Route::delete('/filmactor/{id}','delete');
});