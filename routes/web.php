<?php

Route::get('/', function () {
    return view('welcome');
});

//User
Route::post('/register','UserController@addUser');
Route::post('/login','UserController@login');
Route::get('/showusers', 'UserController@showUsers');

//Session 
Route::post('/save_session','SessionController@save');
Route::get('/show_session','SessionController@session');

//Instructors
Route::get('/showinstructors','InstructorController@getAll');

//Gym
Route::post('/saveGym','LocationController@saveGym');
Route::get('/showGym','LocationController@showGym');


?>
