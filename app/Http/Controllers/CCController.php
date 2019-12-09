<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Classroom;
use App\Model\ClassroomCourse;
use App\Model\Teacher;
use App\Model\SchoolYear;
use App\Model\TeacherHistory;
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
        return view('pages.courses.index', compact('ajax'));
    }

    public function dbTables(Request $request)
    {
        $data     = ClassroomCourse::all();
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
            $tag     = Form::open(["url"=>route('course.destroy', $index->id), "method" => "DELETE"]);
            $tag    .= "<a href=". route('course.show', $index->id) ." class='btn btn-xs btn-info' ><i class='fa fa-edit'></i> Edit</a> ";
            $tag    .= "<button type='submit' class='btn btn-xs btn-danger' onclick='javascript:return confirm(`Apakah anda yakin ingin menghapus data ini?`)' ><i class='fa fa-trash'></i> Hapus</button>";
            $tag    .= Form::close();
            return $tag;
        })
        ->rawColumns([
            'id', 'action'
        ])
        ->make(true);
    }

    public function teacherInput()
    {
        $ts   = Teacher::where('status','=',1)->get();
        return response()->json($ts);
    }

    public function create()
    {
        $years      = SchoolYear::all();
        $classes    = Classroom::all();
        $courses    = Course::all();
        return view('pages.courses.create', compact('classes', 'years', 'courses'));
    }

    public function store(Request $request)
    {
        $t                  = Teacher::where('name', '=', $request->teacher_id)->first();
        foreach ($request->classroom_id as $key => $css) {
            $kelas                 = new TeacherHistory;
            $kelas->teacher_id     = $t->id;
            $kelas->school_year_id = $request->school_year_id;
            $kelas->classroom_id   = $css;
            $kelas->course_id      = $request->course_id;
            $kelas->status         = 1;
            $kelas->save();
            $ck                    = new ClassroomCourse;
            $ck->classroom_id      = $css;
            $ck->course_id         = $request->course_id;
            $ck->teacher_id        = $t->id;
            $ck->assistant         = $request->assistant[$key];
            $ck->status            = 1;
            $ck->save();
        }
        return redirect($this->rdr)->with('notif', 'Data Siswa berhasil ditambahkan');
    }

    public function show($id)
    {
        $data       = Course::findOrFail($id);
        $years      = SchoolYear::all();
        $classes    = Classroom::all();
        $history    = TeacherHistory::where('teacher_id', $id)->orderBy('created_at', 'desc')->first();
        return view($this->folder.'.show', compact('data', 'years', 'classes', 'history'));
    }

    public function update(Request $request, $id)
    {
        $t                  = Teacher::where('name', '=', $request->teacher_id)->first();
        if ($t->name == $request->teacher_id) {
            TeacherHistory::where('teacher_id','=',$t->id)->update([
                'teacher_id'        => $t->id,
                'school_year_id'    => $request->school_year_id,
                'classroom_id'      => $request->classroom_id,
                'course_id'         => $request->course_id,
                'status' => 0,
            ]);
            TeacherHistory::create([
                'teacher_id'        => $t->id,
                'school_year_id'    => $request->school_year_id,
                'classroom_id'      => $request->classroom_id,
                'course_id'         => $request->course_id,
                'status'            => 1
            ]);
        }else {
            TeacherHistory::create([
                'teacher_id'        => $t->id,
                'school_year_id'    => $request->school_year_id,
                'classroom_id'      => $request->classroom_id,
                'course_id'         => $request->course_id,
                'status'            => 1
            ]);
        }
        return redirect()->route('course.show', [$id])->with('notif', 'Data Mata Pelajaran berhasil diubah');
    }

    public function destroy($id)
    {
        //
    }
}
