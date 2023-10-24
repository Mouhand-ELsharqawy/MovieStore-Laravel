<?php

use App\Http\Controllers\CatagoryController;
use Illuminate\Support\Facades\Route;

Route::controller(CatagoryController::class)->group(function(){
    Route::get('/catagory','index');
    Route::post('/catagory','store');
    Route::get('/catagory/{id}','show');
    Route::patch('/catagory/{id}','update');
    Route::delete('/catagory/{id}','destroy');
});