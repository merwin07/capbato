<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\RealTimeClockController;
use App\Http\Controllers\DataController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('real-time-clock');
});

Route::get('/real-time-clock', [RealTimeClockController::class, 'index']);



Route::get('/update-data', [DataController::class, 'index']);
Route::post('/update-data', [DataController::class, 'updateData']);
// routes/web.php


Route::get('/update-data-if-needed', [RealTimeClockController::class, 'updateDataIfNeeded']);

Route::get('/update-data', [DataController::class, 'updateData']);
