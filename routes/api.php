<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ColorController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Products methods
Route::get('/products/all', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::post('/products/register', [ProductController::class, 'store']);
Route::put('/products/update/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);


// Colors methods
Route::get('/colors/all', [ColorController::class, 'index']);
Route::post('/colors/register', [ColorController::class, 'store']);
Route::delete('/colors/{id}', [ColorController::class, 'destroy']);

// Formats methods
Route::get('/formats/all', [FormatController::class, 'index']);
Route::post('/formats/register', [FormatController::class, 'store']);
Route::delete('/formats/{id}', [FormatController::class, 'destroy']);

// Materials methods
Route::get('/materials/all', [MaterialController::class, 'index']);
Route::post('/materials/register', [MaterialController::class, 'store']);
Route::delete('/materials/{id}', [MaterialController::class, 'destroy']);