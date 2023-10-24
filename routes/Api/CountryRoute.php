<?php

use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

Route::controller(CountryController::class)->group( function(){
    Route::get('/country','index');
    Route::post('/country','store');
    Route::get('/country/{id}','show');
    Route::patch('/country/{id}','update');
    Route::delete('/country/{id}','destroy');
});