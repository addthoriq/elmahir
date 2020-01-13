<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Classroom;
use App\Model\User;
use App\Model\ClassHistory;
use App\Model\SchoolYear;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Form;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class ClassroomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $folder     = 'admin.classrooms';
    protected $rdr        = '/classroom';

    public function index()
    {
        if (Gate::allows('index-classroom')) {
            $ajax     = route('classroom.dbtb');
            return view($this->folder.'.index', compact('ajax'));
        }else {
            abort(403);
        }
    }
    public function dbTables(Request $request)
    {
        $data = Classroom::all();
        return Datatables::of($data)
        ->editColumn('user_id', function ($index) {
            return isset($index->user->name) ? $index->user->name : '-';
        })
        ->addColumn('total_student', function($index){
            return ClassHistory::where([['status', 1],['classroom_id', $index->id]])->count();
        })
        ->addColumn('action', function($index){
            $tag     = Form::open(["url"=>route('classroom.destroy', $index->id), "method" => "DELETE"]);
            $tag    .= "<a href=". route('classroom.show', $index->id) ." class='btn btn-xs btn-warning text-white' ><i class='fa fa-search'></i></a> ";
            $tag    .= "<button type='submit' class='btn btn-xs btn-danger' onclick='javascript:return confirm(`Apakah anda yakin ingin menghapus data ini?`)' ><i class='fas fa-trash'></i></button>";
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
        if (Gate::allows('create-classroom')) {
            $years = SchoolYear::all();
            return view($this->folder.'.create', compact('years'));
            // abort(500); //perbaiki dulu di Student JSON nya
        }else {
            abort(403);
        }
    }

    public function store(Request $request)
    {
        if (Gate::allows('create-classroom')) {
            $t = User::where('name', '=', $request->user_id)->first();
            $data                 = new Classroom;
            $data->user_id        = $t->id;
            $data->name           = $request->name;
            $data->max_student    = $request->max_student;
            $data->save();
            foreach ($request->student_id as $std) {
                $kelas     = new ClassHistory;
                $kelas->student_id = $std;
                $kelas->school_year_id = $request->school_year_id;
                $kelas->classroom_id = $data->id;
                $kelas->status     = 1;
                $kelas->save();
            }
            return redirect($this->rdr)->with('notif', 'Ruang Kelas berhasil ditambahkan');
        }else {
            abort(403);
        }
    }

    public function show($id)
    {
        if (Gate::allows('update-course')) {
            $data      = Classroom::findOrFail($id);
            $stds      = ClassHistory::where([['status', 1],['classroom_id', $id]])->get();
            return view($this->folder.'.show', compact('data', 'stds'));
        }else {
            abort(403);
        }
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
        if (Gate::allows('update-course')) {
            $t = User::where('name', '=', $request->user_id)->first();
            Classroom::findOrFail($id)->update([
                'school_year_id' => $request->school_year_id,
                'user_id' => $t->id,
                'name' => $request->name,
                'max_student' => $request->max_student,
            ]);
            return redirect()->route('classroom.show', [$id])->with('notif', 'Ruang Kelas berhasil diubah');
        }else {
            abort(403);
        }
    }

    public function destroy($id)
    {
        $data     = Classroom::findOrFail($id);
        $data->delete();
        return redirect($this->rdr)->with('notif', 'Ruang Kelas berhasil dihapus');
    }
}
