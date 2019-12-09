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

class CourseController extends Controller
{
    protected $folder     = 'pages.course';
    protected $rdr        = '/course/detail';

    public function index()
    {
        $ajax     = route('detail.dbtb');
        return view('pages.courses.course', compact('ajax'));
    }

    public function dbTables(Request $request)
    {
        $data     = Course::all();
        return Datatables::of($data)
        ->editColumn('teacher_id', function ($index) {
            return isset($index->teacher->name) ? $index->teacher->name : '-';
        })
        ->addColumn('action', function($index){
            $tag     = Form::open(["url"=>route('detail.destroy', $index->id), "method" => "DELETE"]);
            $tag    .= "<a href=". route('detail.show', $index->id) ." class='btn btn-xs btn-info' ><i class='fa fa-edit'></i> Edit</a> ";
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
        return view('pages.courses.create', compact('classes', 'years'));
    }

    public function store(Request $request)
    {
        $t                  = Teacher::where('name', '=', $request->teacher_id)->first();
        $data               = new Course;
        $data->name         = $request->name;
        $data->save();
        foreach ($request->classroom_id as $cs) {
            $count              = count($request->classroom_id);
            $kelas                 = new TeacherHistory;
            $kelas->teacher_id     = $t->id;
            $kelas->school_year_id = $request->school_year_id;
            $kelas->classroom_id   = $cs;
            $kelas->course_id      = $data->id;
            $kelas->status         = 1;
            $kelas->save();
            $ck                = new ClassroomCourse;
            $ck->teacher_id  = $cs;
            $ck->classroom_id  = $cs;
            $ck->course_id     = $data->id;
            $ck->assistant  = $request->assistant;
            $ck->status        = 1;
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
                'detail_id'         => $request->detail_id,
                'status' => 0,
            ]);
            TeacherHistory::create([
                'teacher_id'        => $t->id,
                'school_year_id'    => $request->school_year_id,
                'classroom_id'      => $request->classroom_id,
                'detail_id'         => $request->detail_id,
                'status'            => 1
            ]);
        }else {
            TeacherHistory::create([
                'teacher_id'        => $t->id,
                'school_year_id'    => $request->school_year_id,
                'classroom_id'      => $request->classroom_id,
                'detail_id'         => $request->detail_id,
                'status'            => 1
            ]);
        }
        return redirect()->route('detail.show', [$id])->with('notif', 'Data Mata Pelajaran berhasil diubah');
    }
}
