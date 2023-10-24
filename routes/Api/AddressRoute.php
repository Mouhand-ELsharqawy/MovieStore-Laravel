<?php

use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;

Route::controller(AddressController::class)->group(function(){
    Route::get('/address','index');
    Route::post('/address','store');
    Route::get('/address/{id}','show');
    Route::patch('/address/{id}','update');
    Route::delete('/address/{id}','delete');
});