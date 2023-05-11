<?php

use App\Http\Controllers\API\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MashinalarController;
use App\Http\Controllers\API\FoydalanuvchilarController;
use App\Http\Controllers\API\MaydonlarController;

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

Route::post('search-car', [SearchController::class, 'index']);

Route::get('all-cars', [MashinalarController::class, 'index']);
Route::get('all-users', [FoydalanuvchilarController::class, 'index']);
Route::get('all-areas', [MaydonlarController::class, 'index']);

/* CRUD Cars */
Route::post('search-car', [MashinalarController::class, 'search']);
Route::post('create-car', [MashinalarController::class, 'store']);
Route::post('update-car/{id}', [MashinalarController::class, 'update']);
Route::delete('delete-car/{id}', [MashinalarController::class, 'destroy']);
Route::get('cars-export', [MashinalarController::class, 'export']);

/* CRUD Users */
Route::post('search-user', [FoydalanuvchilarController::class, 'search']);
Route::post('create-user', [FoydalanuvchilarController::class, 'store']);
Route::put('update-user/{id}', [FoydalanuvchilarController::class, 'update']);
Route::delete('delete-user/{id}', [FoydalanuvchilarController::class, 'destroy']);
Route::get('/users-export', [FoydalanuvchilarController::class, 'export']);

/* CRUD Areas */
Route::post('search-area', [MaydonlarController::class, 'search']);
Route::post('create-area', [MaydonlarController::class, 'store']);
Route::put('update-area/{id}', [MaydonlarController::class, 'update']);
Route::delete('delete-area/{id}', [MaydonlarController::class, 'destroy']);
Route::get('/areas-export', [MaydonlarController::class, 'export']);
