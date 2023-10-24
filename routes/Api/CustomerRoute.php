<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

    Route::controller(CustomerController::class)->group( function() {
        Route::get('/customer','index');
        Route::post('/customer','store');
        Route::get('/customer/{id}','show');
        Route::patch('/customer/{id}','update');
        Route::delete('/customer/{id}','delete');
    } );