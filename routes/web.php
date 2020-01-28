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
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
//Menghapus Fitur Registrasi yang terdapat pada fitur Auth
Route::match(["GET","POST"], "/register",function(){
    return redirect("/login");
})->name("register");

//Yajra
Route::get('/user/dbtb', 'Admin\UserController@dbTables')->name('user.dbtb');
Route::get('/classroom/dbtb', 'Admin\ClassroomController@dbTables')->name('classroom.dbtb');
Route::get('/year/dbtb', 'Admin\YearController@dbTables')->name('year.dbtb');
Route::get('/student/dbtb', 'Admin\StudentController@dbTables')->name('student.dbtb');
Route::get('/teacher/dbtb', 'Admin\TeacherController@dbTables')->name('teacher.dbtb');
Route::get('/course-deactived/non-dbtb', 'Admin\CourseController@dbNon')->name('course.nondbtb');
Route::get('/course/dbtb', 'Admin\CourseController@dbTables')->name('course.dbtb');
Route::get('/list-course/dbtb', 'Admin\ListCourseController@dbTables')->name('listCourse.dbtb');
Route::get('/alumni/dbtb', 'Admin\AlumnusController@dbTables')->name('alumni.dbtb');
Route::get('/task/dbtb', 'Admin\TaskController@dbTables')->name('task.dbtb');
Route::get('/teacher-deactived/dbtb', 'Admin\UnonController@dbTables')->name('unon.dbtb');
Route::get('/section/dbtb', 'Admin\SectionController@dbTables')->name('section.dbtb');
Route::get('/answertask/{id}/dbtb', 'Admin\AnswerTaskController@dbTables')->name('answertask.dbtb');
//Json
Route::get('/home/chartMurid', 'Admin\HomeController@chartMurid')->name('home.chartMurid');
Route::get('/home/chartGuru', 'Admin\HomeController@chartGuru')->name('home.chartGuru');
Route::get('/classroom/{id}/chartMurid', 'Admin\ClassroomController@chartMurid')->name('classroom.chartMurid');
Route::get('/teacher/json', 'Admin\TeacherController@teacher')->name('teacher.json');  //Untuk AutoComplete
Route::get('/student/json', 'Admin\StudentController@student')->name('student.json');  //Untuk AutoComplete
//Default
Route::resource('/home', 'Admin\HomeController');
Route::resource('/teacher', 'Admin\TeacherController')->except(['destroy']);
Route::put('/teacher-profile/{id}', 'Admin\TeacherController@updateProfile')->name('teacher.profile');
Route::put('/teacher/{id}/avatar', 'Admin\TeacherController@updateAva')->name('teacher.ava');
Route::put('/teacher/{id}/nonaktif', 'Admin\TeacherController@nonaktif')->name('teacher.nonaktif');
Route::put('/teacher/{id}/admin', 'Admin\TeacherController@admin')->name('teacher.admin');
Route::put('/teacher/{id}/op1', 'Admin\TeacherController@op')->name('teacher.op');
Route::put('/teacher/{id}/op2', 'Admin\TeacherController@ope')->name('teacher.ope');
Route::put('/teacher/{id}/nonrole', 'Admin\TeacherController@nonRole')->name('teacher.role');
Route::put('/teacher/{id}/nonCourseHistory', 'Admin\TeacherController@nonCourse')->name('teacher.nonCourse');
Route::put('/teacher/{id}/onCourseHistory', 'Admin\TeacherController@onCourse')->name('teacher.onCourse');
Route::get('/teacher-deactived', 'Admin\UnonController@index')->name('unon.index');
Route::put('/teacher-deactived/{id}/aktif', 'Admin\UnonController@aktif')->name('unon.aktif');
Route::get('/teacher-deactived/{id}', 'Admin\UnonController@show')->name('unon.show');
Route::put('/teacher-deactived/{id}', 'Admin\UnonController@update')->name('unon.update');
Route::put('/teacher-deactived/{id}/profile', 'Admin\UnonController@updateProfile')->name('unon.profile');
Route::put('/teacher-deactived/{id}/avatar', 'Admin\UnonController@updateAva')->name('unon.ava');
Route::resource('/list-course', 'Admin\ListCourseController');
Route::get('/course-nonactived', 'Admin\CourseController@nonActived')->name('course.nonactived');
Route::put('/course/{id}', 'Admin\CourseController@deActived')->name('course.deactived');
Route::resource('/course', 'Admin\CourseController')->except(['destroy', 'edit', 'update']);

Route::resource('/student', 'Admin\StudentController')->except(['destroy']);
Route::put('/student/{id}/profile', 'Admin\StudentController@updateProfile')->name('student.profile');
Route::put('/student/{id}/avatar', 'Admin\StudentController@updateAva')->name('student.ava');
Route::put('/student/{id}/classhistory', 'Admin\StudentController@updateClassHis')->name('student.updateClassHis');
Route::put('/student/{id}/alumni', 'Admin\StudentController@alumni')->name('student.alumni');
Route::get('/alumni', 'Admin\AlumnusController@index')->name('alumni.index');
Route::get('/alumni/{id}', 'Admin\AlumnusController@show')->name('alumni.show');
Route::put('/alumni/{id}/profile', 'Admin\AlumnusController@updateProfile')->name('alumni.profile');
Route::resource('/classroom', 'Admin\ClassroomController');

Route::get('/section/{id}/add', 'Admin\SectionController@add')->name('section.add');
Route::get('/section/{id}/detail', 'Admin\SectionController@detail')->name('section.detail');
Route::put('section/{id}/updateFile', 'Admin\SectionController@updateFile')->name('section.updateFile');
Route::get('section/{id}/deleteFileHome', 'Admin\SectionController@deleteFileHome')->name('section.deleteFileHome');
Route::get('section/{id}/deleteFile', 'Admin\SectionController@deleteFile')->name('section.deleteFile');
Route::post('section/{id}/addFile', 'Admin\SectionController@addFile')->name('section.addFile');
Route::get('/section/{id}/file', 'Admin\SectionController@file')->name('section.file');
Route::get('/section/{id}/fileDownload', 'Admin\SectionController@fileDownload')->name('section.fileDownload');
Route::resource('/section', 'Admin\SectionController');

Route::get('task/{id}/deleteFile', 'Admin\TaskController@deleteFile')->name('task.deleteFile');
Route::get('task/{id}/deleteFileHome', 'Admin\TaskController@deleteFileHome')->name('task.deleteFileHome');
Route::get('/task/{id}/detail', 'Admin\TaskController@detail')->name('task.detail');
Route::patch('/task/{id}', 'Admin\TaskController@restore')->name('task.restore');
Route::get('/task/{id}/fileDownload', 'Admin\TaskController@fileDownload')->name('task.fileDownload');
Route::post('/task/{id}/addFile', 'Admin\TaskController@addFile')->name('task.addFile');
Route::resource('/task', 'Admin\TaskController');

Route::get('/answertask/{id}/home', 'Admin\AnswerTaskController@home')->name('answertask.home');
Route::get('/answertask/{parameter1}+{parameter2}/view', 'Admin\AnswerTaskController@view')->name('answertask.view');
Route::resource('/answertask', 'Admin\AnswerTaskController');

Route::resource('/user', 'Admin\UserController');
Route::put('/user/{id}/profile', 'Admin\UserController@updateProfile')->name('user.profile');
Route::put('/user/{id}/avatar', 'Admin\UserController@updateAva')->name('user.ava');
Route::put('/user/{id}/aktif', 'Admin\UserController@aktif')->name('user.aktif');
Route::put('/user/{id}/unon', 'Admin\UserController@unon')->name('user.unon');
Route::resource('/year', 'Admin\YearController')->except('create');

Route::get('/role', 'Admin\RoleController@index')->name('role.index');
Route::put('/role/{id}', 'Admin\RoleController@update')->name('role.update');
Route::get('/perm', 'Admin\RoleController@home')->name('perm.home');
Route::put('/perm/{id}', 'Admin\RoleController@ubah')->name('perm.ubah');

Route::get('/profile/{id}', 'Admin\ProfileController@index')->name('profile.index');
Route::put('/profile/{id}', 'Admin\ProfileController@update')->name('profile.update');
Route::put('/profile/{id}/unon', 'Admin\ProfileController@unon')->name('profile.unon');
Route::put('/profile/{id}/profile', 'Admin\ProfileController@updateProfile')->name('profile.profile');
Route::put('/profile/{id}/avatar', 'Admin\ProfileController@updateAva')->name('profile.ava');

Route::prefix('students')->group(function () {
	//Student Index Home
    Route::get('/{id}', 'Student\HomeController@index')->name('s1.index');
    Route::get('/{id}/course', 'Student\HomeController@showCourse')->name('s2.showCourse');
    Route::get('/{id}/course/section', 'Student\HomeController@showSection')->name('s3.showSection');
    Route::get('/{id}/course/task', 'Student\HomeController@showTask')->name('s4.showTask');
});
