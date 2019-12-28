<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseDetailController extends Controller
{
    public function index()
    {
    	return view('students.courseDetail.index');
    }
}
