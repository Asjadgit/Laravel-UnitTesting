<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test',[TestController::class,'test']);

// route for testing the data inserting in database
Route::post('/user',[TestController::class,'store']);
Route::post('/user/{id}',[TestController::class,'update']);
Route::post('/deleteuser/{id}',[TestController::class,'delete']);

