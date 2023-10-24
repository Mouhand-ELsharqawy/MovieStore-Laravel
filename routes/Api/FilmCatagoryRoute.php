<?php

use App\Http\Controllers\FilmCatagoryController;
use Illuminate\Support\Facades\Route;

    Route::controller(FilmCatagoryController::class)->group(function(){
        Route::get('/fimcatagory','index');
        Route::post('/fimcatagory','store');
        Route::get('/fimcatagory/{id}','show');
        Route::patch('/fimcatagory/{id}','update');
        Route::delete('/fimcatagory/{id}','destroy');
    });