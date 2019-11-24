<?php

namespace App\Http\Controllers;

use App\Model\Classroom;
use App\Model\ClassHistory;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Model\Teacher;
use Form;

class ClassroomController extends Controller
{
    protected $folder     = 'pages.classrooms';
    protected $rdr        = '/classroom';

    public function index()
    {
        $ajax     = route('classroom.dbtb');
        return view($this->folder.'.index', compact('ajax'));
    }
    public function dbTables(Request $request)
    {
        $data = Classroom::all();
        return Datatables::of($data)
        ->editColumn('teacher_id', function ($index) {
            return isset($index->teacher->name) ? $index->teacher->name : '-';
        })
        ->addColumn('total_student', function($index){
            return Classhistory::where([['status', 1],['classroom_id', $index->id]])->count();
        })
        ->addColumn('action', function($index){
            $tag     = Form::open(["url"=>route('classroom.destroy', $index->id), "method" => "DELETE"]);
            $tag    .= "<a href=". route('classroom.show', $index->id) ." class='btn btn-xs btn-info' ><i class='fa fa-search'></i> Detail</a> ";
            $tag    .= "<button type='submit' class='btn btn-xs btn-danger' onclick='javascript:return confirm(`Apakah anda yakin ingin menghapus data ini?`)' ><i class='fa fa-trash'></i> Hapus</button>";
            $tag    .= Form::close();
            return $tag;
        })
        ->rawColumns([
            'id','action'
        ])
        ->make(true);
    }

    public function create()
    {
        return view($this->folder.'.create');
    }

    public function store(Request $request)
    {
        $data     = new Classroom;
        $data->teacher_id     = $request->teacher_id;
        $data->name           = $request->name;
        $data->max_student  = $request->max_student;
        $data->save();
        return redirect($this->rdr)->with('notif', 'Kelas berhasil ditambahkan');
    }

    public function show($id)
    {
        $data      = Classroom::findOrFail($id);
        $stds      = ClassHistory::where([['status', 1],['classroom_id', $id]])->get();
        return view($this->folder.'.show', compact('data', 'stds'));
    }

    public function chartMurid($id)
    {
        $lk   = ClassHistory::whereHas('student',function($q){
            $q->where('gender','=','L');
        })->where([['status', 1],['classroom_id', $id]])->count();
        $pr   = ClassHistory::whereHas('student',function($q){
            $q->where('gender','=','P');
        })->where([['status', 1],['classroom_id', $id]])->count();
        $gender = [$lk, $pr];
        return response()->json($gender);
    }

    public function update(Request $request, $id)
    {
        Classroom::findOrFail($id)->update([
            'school_year_id'    => $request->school_year_id,
            'teacher_id'        => $request->teacher_id,
            'name'              => $request->name,
            'max_student'     => $request->max_student,
        ]);
        return redirect()->route('classroom.show', [$id])->with('notif', 'Data Kelas berhasil diubah');
    }

    public function destroy($id)
    {
        $data     = Classroom::findOrFail($id);
        $data->delete();
        return redirect($this->rdr)->with('notif', 'Kelas berhasil dihapus');
    }
}
