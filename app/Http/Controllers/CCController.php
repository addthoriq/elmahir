<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Classroom;
use App\Model\SchoolYear;
use App\Model\TeacherHistory;
use App\Model\Teacher;
use App\Model\Course;
use Yajra\Datatables\Datatables;
use Form;

class CCController extends Controller
{
    protected $folder     = 'pages.courses';
    protected $rdr        = '/course';

    public function index()
    {
        $ajax     = route('course.dbtb');
        return view('pages.courses.detail', compact('ajax'));
    }

    public function nonActived()
    {
        $ajax     = route('course.nondbtb');
        return view('pages.courses.nonactivated', compact('ajax'));
    }

    public function dbTables(Request $request)
    {
        $data     = TeacherHistory::where('status',1)->get();
        return Datatables::of($data)
        ->editColumn('teacher_id', function ($index) {
            return isset($index->teacher->name) ? $index->teacher->name : '-';
        })
        ->editColumn('classroom_id', function ($index) {
            return isset($index->classroom->name) ? $index->classroom->name : '-';
        })
        ->editColumn('course_id', function ($index) {
            return isset($index->course->name) ? $index->course->name : '-';
        })
        ->addColumn('action', function($index){
            $tag     = Form::open(["url"=>route('course.deactived', $index->id), "method" => "PUT"]);
            $tag    .= "<button type='submit' class='btn btn-xs btn-danger' onclick='javascript:return confirm(`Apakah anda yakin ingin menonaktifkan ".$index->teacher->name." dari Mata Pelajaran ini?`)' ><i class='fa fa-minus-square'></i> Nonaktifkan</button>";
            $tag    .= Form::close();
            return $tag;
        })
        ->rawColumns([
            'id', 'action'
        ])
        ->make(true);
    }

    public function dbNon(Request $request)
    {
        $data     = TeacherHistory::where('status',0)->get();
        return Datatables::of($data)
        ->editColumn('teacher_id', function ($index) {
            return isset($index->teacher->name) ? $index->teacher->name : '-';
        })
        ->editColumn('classroom_id', function ($index) {
            return isset($index->classroom->name) ? $index->classroom->name : '-';
        })
        ->editColumn('course_id', function ($index) {
            return isset($index->course->name) ? $index->course->name : '-';
        })
        ->rawColumns([
            'id'
        ])
        ->make(true);
    }

    public function create()
    {
        $years      = SchoolYear::all();
        $classes    = Classroom::all();
        $courses    = Course::all();
        return view('pages.courses.detail-create', compact('years', 'classes', 'courses'));
    }

    public function store(Request $request)
    {
        $t                  = Teacher::where('name', '=', $request->teacher_id)->first();
        foreach ($request->classroom_id as $cs) {
            $count              = count($request->classroom_id);
            $kelas                 = new TeacherHistory;
            $kelas->teacher_id     = $t->id;
            $kelas->school_year_id = $request->school_year_id;
            $kelas->classroom_id   = $cs;
            $kelas->course_id      = $data->id;
            $kelas->assistant  = $request->assistant;
            $kelas->status         = 1;
            $kelas->save();
        }
        return redirect($this->rdr)->with('notif', 'Data Mata Pelajaran berhasil ditambahkan');
    }

    public function deActived(Request $request, $id)
    {
        TeacherHistory::where('teacher_id', $id)->update([
            'status'    => 0
        ]);
        return redirect($this->rdr)->with('notif', 'Data Mata Pelajaran berhasil di nonaktifkan');
    }
}
