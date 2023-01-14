<?php

use App\Http\Controllers\Api\PlannedExerciseApiController;
use App\Http\Controllers\Api\RoutineApiController;
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

Route::resource('routines.planned-exercises', PlannedExerciseApiController::class)->shallow();
Route::post('/routines/{routine}', [RoutineApiController::class, 'updatePlannedExercises'])->name('routines.update-planned-exercises');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
