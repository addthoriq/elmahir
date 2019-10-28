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

// Auth::routes();

Route::resource('/home', 'HomeController');
Route::resource('/teacher', 'TeacherController');
Route::resource('/student', 'StudentController');
Route::resource('/course', 'CourseController');
Route::resource('/class', 'ClassController');
Route::resource('/section', 'SectionController');
Route::resource('/task', 'TaskController');
Route::resource('/user', 'UserController');
