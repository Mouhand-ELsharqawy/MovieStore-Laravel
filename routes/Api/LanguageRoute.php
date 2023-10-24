<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

    Route::controller(LanguageController::class)->group(function(){
        Route::get('/language','index');
        Route::post('/language','store');
        Route::get('/language/{id}','show');
        Route::patch('/language/{id}','update');
        Route::delete('/language/{id}','destroy');
    });