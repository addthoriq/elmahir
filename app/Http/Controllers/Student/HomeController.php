<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Model\Course;
use App\Model\User;
use App\Model\Student;
use App\Model\Classroom;
use App\Model\Section;
use App\Model\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($id)
    {
    	$student = Student::find($id);
    	$courses = Course::where('classroom', $student->classroom->name)->get();
    	$tasks = Task::all();
    	return view('student.index', compact('courses', 'tasks', 'student'));
    }

    public function showTask($id)
    {
    	return view('student.tasks.index');
    }
}