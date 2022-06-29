<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\CarController;

Route::get('/', [CarController::class, 'index']);
Route::get('/cars/create', [CarController::class, 'create'])->middleware('auth');
Route::get('/cars/{id}', [CarController::class, 'show']);
route::post('/cars', [CarController::class, 'store']);
route::delete('/cars/{id}', [CarController::class, 'destroy'])->middleware('auth');
Route::get('/cars/edit/{id}', [CarController::class, 'edit'])->middleware('auth');
Route::put('/cars/update/{id}', [CarController::class, 'update'])->middleware('auth');

Route::get('/contact', function () {
    return view('contact');
});

route::post('/cars/join/{id}', [CarController::class, 'joinEvent'])->middleware('auth');

route::delete('/cars/leave/{id}', [CarController::class, 'leaveEvent'])->middleware('auth');