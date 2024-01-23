<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Level\LevelController;
use App\Http\Controllers\Api\Major\MajorController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Faculty\FacultyController;
use App\Http\Controllers\Api\Student\StudentController;

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

Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);

Route::apiResource('student', StudentController::class);
Route::apiResource('faculty', FacultyController::class);
Route::apiResource('major', MajorController::class);
Route::apiResource('level', LevelController::class);
