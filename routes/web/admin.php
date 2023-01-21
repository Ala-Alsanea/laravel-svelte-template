<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\UserController;
use App\Http\Controllers\resource\CarController;


Route::group(
  [
    'middleware' => 'auth',
    'prefix' => 'admin'
  ],
  function () {
    //
    Route::get('dashboard', function () {




      Gate::authorize('is_admin', Auth::user());
      Gate::authorize('is_activated', Auth::user());

      return Inertia::render('pages/admin/Dashboard');
    });

    Route::get('user', [UserController::class, 'getAllUsersToAdmin']);

    Route::post('user/{id}/activate', [UserController::class, 'adminActivateUser']);

    Route::get('user/register', [UserController::class, 'getAdminRegisterUser']);

    Route::post('user/register', [UserController::class, 'adminRegisterUser']);
  }
);
