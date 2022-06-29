<?php

use App\Http\Controllers\Api\VerificationController;
use App\Http\Controllers\Api\CategoryController;
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

Route::get('/test', function (){
    return 'OK';
});

Route::post('/verify', [VerificationController::class, 'verify']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/divisions', [CategoryController::class, 'divisions']);
Route::get('/districts', [CategoryController::class, 'districts']);
Route::get('/upazilas', [CategoryController::class, 'upazilas']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
