<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register','UserController@register');
Route::post('/login','UserController@login');
Route::get('/showusers', 'UserController@showUsers');

//Session 
Route::post('/save_session','SessionController@save');
Route::get('/show_session','SessionController@session');

//Instructors
Route::post('/saveInstructor','InstructorController@saveInstructor');
Route::get('/showinstructors','InstructorController@showinstructors');

//Gym
Route::post('/saveGym','LocationController@saveGym');
Route::get('/showGym','LocationController@showGym');


