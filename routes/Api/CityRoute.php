<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;

    Route::controller(CityController::class)->group( function(){
            Route::get('/city','index');
            Route::post('/city','store');
            Route::get('/city/{id}','show');
            Route::patch('/city/{id}','update');
            Route::delete('/city/{id}','delete');
    });