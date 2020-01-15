<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Model\Course;
use App\Model\User;
use App\Model\Student;
use App\Model\Classroom;
use App\Model\ClassHistory;
use App\Model\Section;
use App\Model\AnswerTask;
use App\Model\Task;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }

    public function index()
    {
        $ch = ClassHistory::where('student_id',Auth::user()->id)->first();
        $courses = Course::where('classroom', $ch->classroom->name)->get();
        $tasks = Task::all();
        return view('student.index', compact('courses', 'tasks'));
    }

    public function showCourse($id)
    {
        $tasks = Task::orderBy('id', 'desc')->get();
        $sections = Section::orderBy('id', 'desc')->get();
        $collection = $tasks->concat($sections);
        $results = $collection->sortByDesc('created_at');
        return view('student.courses.all', compact('tasks', 'sections', 'results'));
    }

    public function showSection($id)
    {
        $sections = Section::orderBy('id', 'desc')->get();
    	return view('student.courses.section', compact('sections'));
    }

    public function showTask($id)
    {
        $tasks = Task::orderBy('id', 'desc')->get();
        return view('student.courses.task', compact('tasks'));
    }
}
