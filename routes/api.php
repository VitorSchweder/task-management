<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('tasks')->group(function () {
    Route::get('/', [App\Http\Controllers\TaskController::class, 'index']);
    Route::post('/', [App\Http\Controllers\TaskController::class, 'store']);
    Route::get('/{taskId}', [App\Http\Controllers\TaskController::class, 'show']);
});

Route::prefix('buildings')->group(function () {
    Route::post('/', [App\Http\Controllers\BuildingController::class, 'store']);
    Route::get('/{buildingId}/tasks', [App\Http\Controllers\BuildingController::class, 'listTasks']);
});

Route::post('comments', [App\Http\Controllers\CommentController::class, 'store']);