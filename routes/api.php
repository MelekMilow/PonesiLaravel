<?php

use App\Http\Controllers\HranaController;
use App\Http\Controllers\PorudzbinaController;
use App\Http\Controllers\RestoranController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>['auth:sanctum']],function(){

    Route::resource('user',UserController::class)->only(['update','store','destroy']);
    Route::resource('restoran',RestoranController::class)->only(['update','store','destroy']);
    Route::resource('hrana',HranaController::class)->only(['update','store','destroy']);
    Route::resource('porudzbina',PorudzbinaController::class)->only(['update','store','destroy']);

Route::post('logout',[AuthController::class,'logout']);



});
