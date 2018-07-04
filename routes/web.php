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
    return view('welcome');
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