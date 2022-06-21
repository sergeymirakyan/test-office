<?php

use App\Http\Controllers\API\LocationController;
use App\Http\Controllers\API\OfficeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::resource('office', OfficeController::class)
->except(['show', 'edit', 'create']);
Route::get('location', [LocationController::class, 'index']);