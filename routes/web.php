<?php

use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\RoutineController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WorkoutPlanController;
use App\Http\Controllers\ExerciseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('routines', RoutineController::class);
    Route::resource('exercises', ExerciseController::class);
    Route::resource('users', UserController::class);
    Route::resource('workout-plans', WorkoutPlanController::class);

    Route::get('chats', [ChatController::class, 'index'])->name('chats.index');
});



