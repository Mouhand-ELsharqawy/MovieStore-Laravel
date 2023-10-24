<?php

use App\Http\Controllers\RentalController;
use Illuminate\Support\Facades\Route;

    Route::controller(RentalController::class)->group(function(){
        Route::get('/rental','index');
        Route::post('/rental','store');
        Route::get('/rental/{id}','show');
        Route::patch('/rental/{id}','update');
        Route::delete('/rental/{id}','destroy');
    });