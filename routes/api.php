<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\CurriculumLevelController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
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

Route::post('login', [AuthController::class, 'login']);
// Route::post('register', [AuthController::class, 'register']);

Route::apiResource('departments', DepartmentController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('profiles', ProfileController::class);

Route::apiResource('curriculums', CurriculumController::class);
Route::apiResource('curriculum-levels', CurriculumLevelController::class);
Route::apiResource('curriculum_subjects', SubjectController::class);
Route::apiResource('subjects', SubjectController::class);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('getUser', [AuthController::class, 'getUser']);
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
