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
Route::get('/teacher/dbtb', 'TeacherController@dbTables')->name('teacher.dbtb');
Route::get('/course-deactived/non-dbtb', 'CCController@dbNon')->name('course.nondbtb');
Route::get('/course/dbtb', 'CCController@dbTables')->name('course.dbtb');
Route::get('/course-detail/dbtb', 'CourseController@dbTables')->name('detail.dbtb');
Route::get('/alumni/dbtb', 'AlumnusController@dbTables')->name('alumni.dbtb');
Route::get('/task/dbtb', 'TaskController@dbTables')->name('task.dbtb');
Route::get('/teacher-deactived/dbtb', 'UnonController@dbTables')->name('unon.dbtb');

Route::get('/sectioncourse/dbcourse', 'SectionCourseController@dbCourse')->name('sectioncourse.dbcourse');
Route::get('/sectioncourse/{id}/dbsection', 'SectionCourseController@dbSection')->name('sectioncourse.dbsection');
Route::get('/answertask/{id}/dbtb', 'AnswerTaskController@dbTables')->name('answertask.dbtb');

//Json
//Materi Bab
Route::get('/section/dbtb', 'SectionController@dbTables')->name('section.dbtb');
Route::get('/mapel/dbtb', 'ChapterController@mapel')->name('mapel.dbtb');
Route::get('/chapter/{id}/homeChapter', 'ChapterController@homeChapter')->name('chapter.homeChapter');
Route::get('/chapter/{id}/dbtb', 'ChapterController@chapter')->name('chapter.dbtb');


//Materi
Route::get('/sectioncourse/courselist', 'SectionCourseController@courseList')->name('sectioncourse.courselist');
Route::get('/sectioncourse/{id}/sectionlist', 'SectionCourseController@sectionList')->name('sectioncourse.sectionlist');
Route::get('/section/{id}/add', 'SectionController@add')->name('section.add');

//Materi
Route::get('/section/{id}/home', 'SectionController@home')->name('section.home');
Route::put('section/{id}/updateFile', 'SectionController@updateFile')->name('section.updateFile');
Route::delete('section/{id}/deleteFile', 'SectionController@deleteFile')->name('section.deleteFile');
Route::post('section/{id}/addFile', 'SectionController@addFile')->name('section.addFile');
Route::get('/section/{id}/file', 'SectionController@file')->name('section.file');
Route::get('/section/{id}/fileDownload', 'SectionController@fileDownload')->name('section.fileDownload');

//Task
Route::patch('/task/{id}', 'TaskController@restore')->name('task.restore');
Route::get('/task/{id}/fileDownload', 'TaskController@fileDownload')->name('task.fileDownload');
Route::post('/task/{id}/addFile', 'TaskController@addFile')->name('task.addFile');

//Answer Task
Route::get('/answertask/{id}/home', 'AnswerTaskController@home')->name('answertask.home');
Route::post('/answertask/{id}/storeScore', 'AnswerTaskController@storeScore')->name('answertask.storeScore');
Route::put('/answertask/{id}/updateScore', 'AnswerTaskController@updateScore')->name('answertask.updateScore');

Route::get('/home/chartMurid', 'HomeController@chartMurid')->name('home.chartMurid');
Route::get('/home/chartGuru', 'HomeController@chartGuru')->name('home.chartGuru');
Route::get('/classroom/{id}/chartMurid', 'ClassroomController@chartMurid')->name('classroom.chartMurid');
Route::get('/course/teacher', 'CCController@teacher')->name('course.teacher');

//Default
Route::resource('/home', 'HomeController');
Route::resource('/teacher', 'TeacherController')->except(['destroy']);
Route::put('/teacher/{id}/profile', 'TeacherController@updateProfile')->name('teacher.profile');
Route::put('/teacher/{id}/avatar', 'TeacherController@updateAva')->name('teacher.ava');
Route::put('/teacher/{id}/nonaktif', 'TeacherController@nonaktif')->name('teacher.nonaktif');
Route::put('/teacher/{id}/admin', 'TeacherController@admin')->name('teacher.admin');
Route::put('/teacher/{id}/op1', 'TeacherController@op')->name('teacher.op');
Route::put('/teacher/{id}/op2', 'TeacherController@ope')->name('teacher.ope');
Route::put('/teacher/{id}/nonrole', 'TeacherController@nonRole')->name('teacher.role');
Route::put('/teacher/{id}/nonCourseHistory', 'TeacherController@nonCourse')->name('teacher.nonCourse');
Route::put('/teacher/{id}/onCourseHistory', 'TeacherController@onCourse')->name('teacher.onCourse');
Route::get('/teacher-deactived', 'UnonController@index')->name('unon.index');
Route::put('/teacher-deactived/{id}/aktif', 'UnonController@aktif')->name('unon.aktif');
Route::get('/teacher-deactived/{id}', 'UnonController@show')->name('unon.show');
Route::put('/teacher-deactived/{id}', 'UnonController@update')->name('unon.update');
Route::put('/teacher-deactived/{id}/profile', 'UnonController@updateProfile')->name('unon.profile');
Route::put('/teacher-deactived/{id}/avatar', 'UnonController@updateAva')->name('unon.ava');
Route::resource('/course-detail', 'CourseController');
Route::get('/course-nonactived', 'CCController@nonActived')->name('course.nonactived');
Route::put('/course/{id}', 'CCController@deActived')->name('course.deactived');
Route::resource('/course', 'CCController')->except(['destroy', 'edit', 'update']);
Route::resource('/student', 'StudentController')->except(['destroy']);
Route::put('/student/{id}/profile', 'StudentController@updateProfile')->name('student.profile');
Route::put('/student/{id}/avatar', 'StudentController@updateAva')->name('student.ava');
Route::put('/student/{id}/classhistory', 'StudentController@updateClassHis')->name('student.updateClassHis');
Route::put('/student/{id}/alumni', 'StudentController@alumni')->name('student.alumni');
Route::get('/alumni', 'AlumnusController@index')->name('alumni.index');
Route::get('/alumni/{id}', 'AlumnusController@show')->name('alumni.show');
Route::resource('/classroom', 'ClassroomController');
Route::resource('/section', 'SectionController');
Route::resource('/chapter', 'ChapterController');
Route::resource('/task', 'TaskController');
Route::resource('/answertask', 'AnswerTaskController');
Route::resource('/user', 'UserController');
Route::put('/user/{id}/avatar', 'UserController@updateAva')->name('user.ava');
Route::put('/user/{id}/aktif', 'UserController@aktif')->name('user.aktif');
Route::put('/user/{id}/unon', 'UserController@unon')->name('user.unon');
Route::resource('/year', 'YearController')->except(['create']);
