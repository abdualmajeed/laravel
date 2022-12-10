<?php

use App\Http\Controllers\API\LoginApiController;
use App\Http\Controllers\API\TasksApiController;
use App\Http\Controllers\API\UserApiController;
use App\Http\Controllers\Dashboard\TasksController;
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

Route::get('t/tasks', [TasksApiController::class, 'v2Task']);
Route::get('t/users', [UserApiController::class, 'v2User']);
Route::get('t/login', [LoginApiController::class, 'v2Login']);

