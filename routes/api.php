<?php

use App\Http\Controllers\Api\RitaseAPIController;
use App\Http\Controllers\Api\UnitAPIController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/units', [UnitAPIController::class, 'all']);

Route::get('/ritase', [RitaseAPIController::class, 'all']);

Route::post('/ritase', [RitaseAPIController::class, 'create']);

Route::put('/ritase/{ritase_id}', [RitaseAPIController::class, 'edit']);

Route::delete('/ritase/{ritase_id}', [RitaseAPIController::class, 'delete']);
