<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\UserController;
use App\Http\Controllers\resource\CarController;


// auth
Route::get('/auth/login', [AuthController::class, 'showLogin'])->name('login');

Route::get('/login',function(){
    return  redirect('/auth/login');
});


Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/auth/logout', [AuthController::class, 'logout']);

Route::group(
  [
    'middleware' => 'auth',
    'prefix' => ''
  ],
  function () {

    Route::get('/user/{id}', [UserController::class, 'profile']);
  }
);
