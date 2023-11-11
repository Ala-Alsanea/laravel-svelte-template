<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\UserController;
use App\Http\Controllers\resource\CarController;




// crud
//
Route::group(
  [
    'middleware' => 'auth',
    'prefix' => ''
  ],
  function () {

    // auth



    // view all
    Route::get('/cars', [CarController::class, 'index']);
    // create
    Route::get('/cars/create', [CarController::class, 'create']);
    Route::post('/cars', [CarController::class, 'store']);
    // update
    Route::get('/cars/{id}/edit', [CarController::class, 'edit']);
    Route::put('/cars/{id}', [CarController::class, 'update']);
    // delete
    Route::delete('/cars/{id}', [CarController::class, 'destroy']);
  }
);