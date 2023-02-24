<?php

use App\Http\Controllers\API\TourismController;
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
Route::get('tourism', [TourismController::class, 'index']);
Route::get('tourism/store', [TourismController::class, 'store']);
Route::post('tourism/store', [TourismController::class, 'store']);
Route::get('tourism/show/{id}', [TourismController::class, 'show']);
Route::get('tourism/update/{id}', [TourismController::class, 'update']);
Route::put('tourism/update/{id}', [TourismController::class, 'update']);
Route::delete('tourism/destroy/{id}', [TourismController::class, 'destroy']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
