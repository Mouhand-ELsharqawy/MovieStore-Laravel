<?php

use App\Http\Controllers\FilmController;
use Illuminate\Support\Facades\Route;

    Route::controller(FilmController::class)->group(function(){
        Route::get('/film','index');
        Route::post('/film','store');
        Route::get('/film/{id}','show');
        Route::patch('/film/{id}','patch');
        Route::delete('/film/{id}','destroy');
    });