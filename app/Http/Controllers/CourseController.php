<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Classroom;
use App\Model\Teacher;
use App\Model\SchoolYear;
use App\Model\TeacherHistory;
use App\Model\Course;
use Yajra\Datatables\Datatables;
use Form;

class CourseController extends Controller
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
        $data     = Course::all();
        return Datatables::of($data)
        ->editColumn('teacher_id', function ($index) {
            return isset($index->teacher->name) ? $index->teacher->name : '-';
        })
        ->editColumn('class_id', function ($index) {
            return isset($index->classroom->name) ? $index->classroom->name : '-';
        })
        ->addColumn('action', function($index){
            $tag     = Form::open(["url"=>route('course.destroy', $index->id), "method" => "DELETE"]);
            $tag    .= "<a href=". route('course.show', $index->id) ." class='btn btn-xs btn-info' ><i class='fa fa-search'></i> Detail</a> ";
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $t                  = Teacher::where('name', '=', $request->teacher_id)->first();
        $data               = new Course;
        $data->name         = $request->name;
        $data->classroom_id     = $request->classroom_id;
        $data->teacher_id   = $t->id;
        $data->assistant    = $request->assistant;
        $data->semester     = $request->semester;
        $data->save();
        $kelas     = new TeacherHistory;
        $kelas->teacher_id = $t->id;
        $kelas->school_year_id = $request->school_year_id;
        $kelas->classroom_id = $request->classroom_id;
        $kelas->course_id    = $data->id;
        $kelas->status     = 1;
        $kelas->save();
        return redirect($this->rdr)->with('notif', 'Data Siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
