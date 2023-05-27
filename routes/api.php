<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\PartController;
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

Route::get('/cars',[CarController::class,'index']);
Route::prefix('/car')->group(function(){
    Route::post('/store',[CarController::class,'store']);
    Route::put('/{id}',[CarController::class,'update']);
    Route::delete('/{id}',[CarController::class,'destroy']);
    Route::get('/{id}',[CarController::class,'show']);
});

Route::get('/parts',[PartController::class,'index']);
Route::prefix('/part')->group(function(){
    Route::post('/store',[PartController::class,'store']);
    Route::put('/{id}',[PartController::class,'update']);
    Route::delete('/{id}',[PartController::class,'destroy']);
    Route::get('/{id}',[PartController::class,'show']);
});


