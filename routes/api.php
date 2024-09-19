<?php

use App\Http\Controllers\LocationController;
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

Route::get('/provinces', [LocationController::class, 'getProvinces']);
Route::get('/districts/{provinceId}', [LocationController::class, 'getDistricts']);
Route::get('/wards/{districtId}', [LocationController::class, 'getWards']);