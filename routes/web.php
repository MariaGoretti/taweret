<?php

Route::get('/', function () {
    return view('welcome');
});

Route::post('/register','UserController@addUser');
Route::post('/login','UserController@loginUser');
Route::get('/showusers', 'UserController@showUsers');

Route::post('/save_session','SessionController@save');
Route::get('/show_sessions','SessionController@getAll');

Route::get('/showinstructors','InstructorController@getAll');

Route::post('/saveGym','LocationController@saveGym');
Route::get('/showGym','LocationController@showGym');


?>
