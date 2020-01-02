<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Classroom;
use App\Model\SchoolYear;
use App\Model\Course;
use App\Model\User;
use App\Model\ListCourse;
use Yajra\Datatables\Datatables;
use Form;

class CourseController extends Controller
{
    protected $folder     = 'admin.courses';
    protected $rdr        = '/course';

    public function index()
    {
        $ajax     = route('course.dbtb');
        return view('admin.courses.index', compact('ajax'));
    }

    public function nonActived()
    {
        $ajax     = route('course.nondbtb');
        return view('admin.courses.nonactivated', compact('ajax'));
    }

    public function dbTables(Request $request)
    {
        $data     = Course::where('status',1)->get();
        return Datatables::of($data)
        ->editColumn('user_id', function ($index) {
            return isset($index->user->name) ? $index->user->name : '-';
        })
        ->addColumn('action', function($index){
            $tag     = Form::open(["url"=>route('course.deactived', $index->id), "method" => "PUT"]);
            $tag    .= "<button type='submit' class='btn btn-xs btn-danger' onclick='javascript:return confirm(`Apakah anda yakin ingin mengakhiri Mata Pelajaran ".$index->list_course." ?`)' ><i class='fa fa-minus-square'></i> Akhiri</button>";
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
        $data     = Course::where('status',0)->get();
        return Datatables::of($data)
        ->editColumn('user_id', function ($index) {
            return isset($index->user->name) ? $index->user->name : '-';
        })
        ->rawColumns([
            'id'
        ])
        ->make(true);
    }

    public function user()
    {
        $tc     = User::where('role_id',4)->get();
        return response()->json($tc);
    }

    public function create()
    {
        $years      = SchoolYear::all();
        $classes    = Classroom::all();
        $courses    = ListCourse::all();
        return view('admin.courses.create', compact('years', 'classes', 'courses'));
    }

    public function store(Request $request)
    {
        $t                         = User::where('name', '=', $request->user_id)->first();
        foreach ($request->classroom as $cs => $ck) {
            $kelas                 = new Course;
            $kelas->user_id        = $t->id;
            $kelas->school_year_id = $request->school_year_id;
            $kelas->classroom      = $ck;
            $kelas->list_course    = $request->list_course;
            $kelas->assistant      = $request->assistant[$cs];
            $kelas->status         = 1;
            $kelas->save();
        }
        return redirect($this->rdr)->with('notif', 'Data Mata Pelajaran berhasil ditambahkan');
    }

    public function deActived(Request $request, $id)
    {
        Course::where('user_id', $id)->update([
            'status'    => 0
        ]);
        return redirect($this->rdr)->with('notif', 'Data Mata Pelajaran berhasil di nonaktifkan');
    }
}
