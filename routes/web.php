<?php

Route::get('/', function () {
    return view('welcome');
});

Route::post('/register','UserController@addUser');
Route::post('/login','UserController@loginUser');

Route::post('/add_session','SessionController@addSession');
Route::get('/show_sessions','SessionController@getAll');

Route::get('/showinstructors','InstructorController@getAll');

Route::get('/showGym','LocationController@showGymLocation');
Route::get('/nearGym','LocationController@nearGymLocation');


?>



             