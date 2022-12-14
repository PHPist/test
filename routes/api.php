<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::controller(\App\Http\Controllers\Api\RegisterController::class)->group(function (){
   Route::post("register","register");
   Route::post("login","login");
});


Route::middleware('auth:sanctum')->group( function (){
    Route::resource("posts", \App\Http\Controllers\Api\PostController::class);
});
