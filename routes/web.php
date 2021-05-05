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

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard/devices/{device:identifier}', [\App\Http\Controllers\DeviceController::class, 'show']);
Route::get('dashboard/devices', [\App\Http\Controllers\DeviceController::class, 'index']);