<?php

use App\HTTP\Controllers\api\DrinkController;
use App\HTTP\Controllers\api\TypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get( "/drinks", [DrinkController::class, "getDrinks"] );
Route::get( "/drink", [DrinkController::class, "getDrink"] );
Route::post( "/newdrink", [DrinkController::class, "newDrink"] );
Route::put( "/updatedrink", [DrinkController::class, "updateDrink"] );
Route::delete( "/destroydrink", [DrinkController::class, "destroyDrink"] );

Route::get( "/gettypes", [TypeController::class, "getTypes"] );