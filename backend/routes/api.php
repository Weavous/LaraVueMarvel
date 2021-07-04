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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("v1")->group(function () {
    Route::prefix("marvel")->group(function () {
        Route::get("characters", [App\Http\Controllers\MarvelHttpRequestController::class, "characters"]);
        Route::get("character", [App\Http\Controllers\MarvelHttpRequestController::class, "character"]);
        Route::get("stories", [App\Http\Controllers\MarvelHttpRequestController::class, "stories"]);
    });
});
