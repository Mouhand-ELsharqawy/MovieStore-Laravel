<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

    Route::controller(PaymentController::class)->group(function(){
        Route::get('/payment','index');
        Route::post('/payment','store');
        Route::get('/payment/{id}','show');
        Route::patch('/payment/{id}','update');
        Route::delete('/payment/{id}','destroy');
    });