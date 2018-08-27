<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('student', 'StudentController', ['except' => []]);
Route::resource('course', 'CourseController', ['except' => []]);
Route::resource('course_student', 'CourseStudentController', ['except' => []]);
Route::get('country/{country_id}/districts', 'StudentController@getDistricts');
Route::get('district/{district_id}/thanas', 'StudentController@getThanas');
Route::auth();

Route::get('/home', 'CourseController@index');
