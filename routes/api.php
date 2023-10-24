<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


require __DIR__.'/Api/ActorRoute.php';
require __DIR__.'/Api/AddressRoute.php';
require __DIR__.'/Api/CatagoryRoute.php';
require __DIR__.'/Api/CityRoute.php';
require __DIR__.'/Api/CountryRoute.php';
require __DIR__.'/Api/CustomerRoute.php';
require __DIR__.'/Api/FilmActorRoute.php';
require __DIR__.'/Api/FilmCatagoryRoute.php';
require __DIR__.'/Api/FilmRoute.php';
require __DIR__.'/Api/InventoryRoute.php';
require __DIR__.'/Api/LanguageRoute.php';
require __DIR__.'/Api/PaymentRoute.php';
require __DIR__.'/Api/RentalRoute.php';
require __DIR__.'/Api/StaffRoute.php';
require __DIR__.'/Api/StoreRoute.php';
