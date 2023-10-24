<?php

use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

    Route::controller(StoreController::class)->group(function(){
        Route::get('/store','index');
        Route::post('/store','store');
        Route::get('/store/{id}','show');
        Route::patch('/store/{id}','update');
        Route::delete('/store/{id}','delete');
    });