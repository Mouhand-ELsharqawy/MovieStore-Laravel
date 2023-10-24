<?php

use App\Http\Controllers\ActorController;
use Illuminate\Support\Facades\Route;

Route::controller(ActorController::class)->group(function(){
    Route::get('/actor','index');
    Route::post('/actor','store');
    Route::get('/actor/{id}','show');
    Route::patch('/actor/{id}','update');
    Route::delete('/actor/{id}','destory');
});