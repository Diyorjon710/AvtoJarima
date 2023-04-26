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

Route::post('/search-car', [SearchController::class, 'index']);
Route::get('/all-cars', [MashinalarController::class, 'index']);
Route::get('/all-users', [FoydalanuvchilarController::class, 'index']);
Route::get('/all-areas', [MaydonlarController::class, 'index']);

Route::post('/create-car', [MashinalarController::class, 'store']);
Route::put('/update-car/{id}', [MashinalarController::class, 'update']);

