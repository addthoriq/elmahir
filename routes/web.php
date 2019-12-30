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
Route::get('/user/dbtb', 'Admin\UserController@dbTables')->name('user.dbtb');
Route::get('/classroom/dbtb', 'Admin\ClassroomController@dbTables')->name('classroom.dbtb');
Route::get('/year/dbtb', 'Admin\YearController@dbTables')->name('year.dbtb');
Route::get('/student/dbtb', 'Admin\StudentController@dbTables')->name('student.dbtb');
Route::get('/teacher/dbtb', 'Admin\TeacherController@dbTables')->name('teacher.dbtb');
Route::get('/course-deactived/non-dbtb', 'Admin\CourseController@dbNon')->name('course.nondbtb');
Route::get('/course/dbtb', 'Admin\CourseController@dbTables')->name('course.dbtb');
Route::get('/course-detail/dbtb', 'Admin\ListCourseController@dbTables')->name('detail.dbtb');
Route::get('/alumni/dbtb', 'Admin\AlumnusController@dbTables')->name('alumni.dbtb');
Route::get('/task/dbtb', 'Admin\TaskController@dbTables')->name('task.dbtb');
Route::get('/teacher-deactived/dbtb', 'Admin\UnonController@dbTables')->name('unon.dbtb');
Route::get('/sectioncourse/dbcourse', 'Admin\SectionCourseController@dbCourse')->name('sectioncourse.dbcourse');
Route::get('/sectioncourse/{id}/dbsection', 'Admin\SectionCourseController@dbSection')->name('sectioncourse.dbsection');
Route::get('/answertask/{id}/dbtb', 'Admin\AnswerTaskController@dbTables')->name('answertask.dbtb');
//Json
Route::get('/home/chartMurid', 'Admin\HomeController@chartMurid')->name('home.chartMurid');
Route::get('/home/chartGuru', 'Admin\HomeController@chartGuru')->name('home.chartGuru');
Route::get('/classroom/{id}/chartMurid', 'Admin\ClassroomController@chartMurid')->name('classroom.chartMurid');
Route::get('/course/teacher', 'Admin\CourseController@teacher')->name('course.teacher');
//Default
Route::resource('/home', 'Admin\HomeController');
Route::resource('/teacher', 'Admin\TeacherController')->except(['destroy']);
Route::put('/teacher/{id}/profile', 'Admin\TeacherController@updateProfile')->name('teacher.profile');
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
Route::resource('/course-detail', 'Admin\ListCourseController');
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
Route::resource('/section', 'Admin\SectionController');
Route::resource('/task', 'Admin\TaskController');
Route::resource('/answertask', 'Admin\AnswerTaskController');
Route::get('/sectioncourse/courselist', 'Admin\SectionCourseController@courseList')->name('sectioncourse.courselist');
Route::get('/sectioncourse/{id}/sectionlist', 'Admin\SectionCourseController@sectionList')->name('sectioncourse.sectionlist');
Route::get('/section/{id}/add', 'Admin\SectionController@add')->name('section.add');
Route::get('/section/{id}/home', 'Admin\SectionController@home')->name('section.home');
Route::put('section/{id}/updateFile', 'Admin\SectionController@updateFile')->name('section.updateFile');
Route::delete('section/{id}/deleteFile', 'Admin\SectionController@deleteFile')->name('section.deleteFile');
Route::post('section/{id}/addFile', 'Admin\SectionController@addFile')->name('section.addFile');
Route::get('/section/{id}/file', 'Admin\SectionController@file')->name('section.file');
Route::get('/section/{id}/fileDownload', 'Admin\SectionController@fileDownload')->name('section.fileDownload');
Route::patch('/task/{id}', 'Admin\TaskController@restore')->name('task.restore');
Route::get('/task/{id}/fileDownload', 'Admin\TaskController@fileDownload')->name('task.fileDownload');
Route::post('/task/{id}/addFile', 'Admin\TaskController@addFile')->name('task.addFile');
Route::get('/answertask/{id}/home', 'Admin\AnswerTaskController@home')->name('answertask.home');
Route::post('/answertask/{id}/storeScore', 'Admin\AnswerTaskController@storeScore')->name('answertask.storeScore');
Route::put('/answertask/{id}/updateScore', 'Admin\AnswerTaskController@updateScore')->name('answertask.updateScore');
Route::resource('/user', 'Admin\UserController');
Route::put('/user/{id}/profile', 'Admin\UserController@updateProfile')->name('user.profile');
Route::put('/user/{id}/avatar', 'Admin\UserController@updateAva')->name('user.ava');
Route::put('/user/{id}/aktif', 'Admin\UserController@aktif')->name('user.aktif');
Route::put('/user/{id}/unon', 'Admin\UserController@unon')->name('user.unon');
Route::resource('/year', 'Admin\YearController')->except(['create']);


Route::prefix('studentlog')->group(function () {
	//Student Index Home
    Route::get('/', 'Student\HomeController@index')->name('s1.index');
    //Course Detail
    Route::get('/coursedetail', 'Student\CourseDetailController@index')->name('s2.index');
});
