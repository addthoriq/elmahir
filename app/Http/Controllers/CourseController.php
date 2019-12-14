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
    protected $folder     = 'pages.courses';
    protected $rdr        = '/course-detail';

    public function index()
    {
        $ajax     = route('detail.dbtb');
        return view('pages.courses.index', compact('ajax'));
    }

    public function dbTables(Request $request)
    {
        $data     = Course::all();
        return Datatables::of($data)
        ->addColumn('action', function($index){
            $tag     = Form::open(["url"=>route('course.destroy', $index->id), "method" => "DELETE"]);
            $tag    .= "<a href=". route('course-detail.show', $index->id) ." class='btn btn-xs btn-info' ><i class='fa fa-edit'></i> Edit</a> ";
            $tag    .= "<button type='submit' class='btn btn-xs btn-danger' onclick='javascript:return confirm(`Apakah anda yakin ingin menghapus data ini?`)' ><i class='fa fa-trash'></i> Hapus</button>";
            $tag    .= Form::close();
            return $tag;
        })
        ->rawColumns([
            'id', 'action'
        ])
        ->make(true);
    }

    public function create()
    {
        return view('pages.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name'=>['required']]);
        foreach ($request->name as $nm) {
            $mpl           = new Course;
            $mpl->name     = $nm;
            $mpl->save();
        }
        return redirect($this->rdr)->with('notif', 'Daftar Mata Pelajaran berhasil ditambahkan');
    }

    public function show($id)
    {
        $data       = Course::findOrFail($id);
        return view($this->folder.'.show', compact('data'));
    }

    public function update(Request $request, $id)
    {
        if ($request->name == Course::findOrFail($id)->name) {
            return redirect()->route('course-detail.show', [$id])->with('notif', 'Tidak ada perubahan pada Daftar Mata Pelajaran');
        }else {
            Course::findOrFail($id)->update([
                'name'     => $request->name
            ]);
            return redirect()->route('course-detail.index')->with('notif', 'Daftar Mata Pelajaran berhasil diubah');
        }
    }
}
