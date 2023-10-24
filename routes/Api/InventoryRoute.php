<?php

use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Route;

    Route::controller(InventoryController::class)->group(function(){
        Route::get('/inventory','index');
        Route::post('/inventory','store');
        Route::get('/inventory/{id}','show');
        Route::patch('/inventory/{id}','update');
        Route::delete('/inventory/{id}','destroy');
    });