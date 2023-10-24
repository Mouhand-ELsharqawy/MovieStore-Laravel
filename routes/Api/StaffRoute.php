<?php

use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

    Route::controller(StaffController::class)->group(function(){
        Route::get('/staff','index');
        Route::post('/staff','store');
        Route::get('/staff/{id}','show');
        Route::patch('/staff/{id}','update');
        Route::delete('/staff/{id}','delete');
    });