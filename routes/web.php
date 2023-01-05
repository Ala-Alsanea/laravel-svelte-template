<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\UserController;
use App\Http\Controllers\resource\CarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('pages/landing_page_v1/Index');
});



// auth
Route::get('/auth/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/auth/logout', [AuthController::class, 'logout']);




// crud
//
Route::group(
    [
        'middleware' => 'auth',
        'prefix' => ''
    ],
    function () {

        // auth
        Route::get('/user/{id}', [UserController::class, 'profile']);


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




// test
Route::get('/test', [CarController::class, 'test']);