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

//Yajra
Route::get('/user/dbtb', 'UserController@dbTables')->name('user.dbtb');
Route::get('/classroom/dbtb', 'ClassroomController@dbTables')->name('classroom.dbtb');
Route::get('/year/dbtb', 'YearController@dbTables')->name('year.dbtb');
Route::get('/student/dbtb', 'StudentController@dbTables')->name('student.dbtb');
Route::get('/alumni/dbtb', 'AlumnusController@dbTables')->name('alumni.dbtb');

Route::get('/home/chartMurid', 'HomeController@chartMurid')->name('home.chartMurid');
Route::get('/home/chartGuru', 'HomeController@chartGuru')->name('home.chartGuru');

//Default
Route::resource('/home', 'HomeController');
Route::resource('/teacher', 'TeacherController');
Route::resource('/course', 'CourseController');
Route::resource('/student', 'StudentController');
Route::put('/student/{id}/profile', 'StudentController@updateProfile')->name('student.profile');
Route::put('/student/{id}/avatar', 'StudentController@updateAva')->name('student.ava');
Route::put('/student/{id}/classhistory', 'StudentController@updateClassHis')->name('student.updateClassHis');
Route::put('/student/{id}/alumni', 'StudentController@alumni')->name('student.alumni');
Route::get('/alumni', 'AlumnusController@index')->name('alumni.index');
Route::get('/alumni/{id}', 'AlumnusController@show')->name('alumni.show');
Route::resource('/classroom', 'ClassroomController');
Route::resource('/section', 'SectionController');
Route::resource('/task', 'TaskController');
Route::resource('/user', 'UserController');
Route::put('/user/{id}/avatar', 'UserController@updateAva')->name('user.ava');
Route::resource('/year', 'YearController');
