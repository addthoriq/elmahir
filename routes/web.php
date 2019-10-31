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

Route::get('/user/dbtb', 'UserController@dbTables')->name('user.dbtb');
Route::get('/classroom/dbtb', 'ClassroomController@dbTables')->name('classroom.dbtb');
Route::get('/year/dbtb', 'YearController@dbTables')->name('year.dbtb');
Route::get('/student/dbtb', 'StudentController@dbTables')->name('student.dbtb');

Route::resource('/home', 'HomeController');
Route::resource('/teacher', 'TeacherController');
Route::resource('/course', 'CourseController');
Route::resource('/student', 'StudentController');
Route::put('/student/{id}/profile', 'StudentController@updateProfile')->name('student.profile');
Route::put('/student/{id}/avatar', 'StudentController@updateAva')->name('student.ava');
Route::put('/student/{id}/classhistory', 'StudentController@updateClassHis')->name('student.updateClassHis');
Route::resource('/classroom', 'ClassroomController');
Route::resource('/section', 'SectionController');
Route::resource('/task', 'TaskController');
Route::resource('/user', 'UserController');
Route::put('/user/{id}/avatar', 'UserController@updateAva')->name('user.ava');
Route::resource('/year', 'YearController');
