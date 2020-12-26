<?php

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

Route::get('/', function () {
    return redirect()->route('routine.index');
});

Auth::routes();

Route::group(['middleware' => ['auth'],'namespace' => 'User'], function () {
    Route::resource('/routine', 'RoutineController');
    Route::resource('/log', 'RoutineLogController');
    Route::resource('/exercise', 'ExerciseController');
});

