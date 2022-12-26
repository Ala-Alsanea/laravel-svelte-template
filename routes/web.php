<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

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
    return redirect('/view');
});
Route::get('/view', [CarController::class, 'view']);

Route::get('/create', [CarController::class, 'create']);
Route::post('/create/store', [CarController::class, 'store']);
Route::delete('/delete/{id}', [CarController::class, 'delete']);

// test
Route::get('/test', [CarController::class, 'test']);