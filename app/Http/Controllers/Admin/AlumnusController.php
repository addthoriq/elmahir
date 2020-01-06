<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Student;
use Laravolt\Avatar\Avatar;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;
use App\Model\ClassHistory;
use App\Model\Classroom;
use App\Model\SchoolYear;

class AlumnusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected $folder      = 'admin.alumni';
    public function index()
    {
        $ajax     = route('alumni.dbtb');
        return view($this->folder.'.index', compact('ajax'));
    }

    public function dbTables(Request $request)
    {
        $data     = Student::where('status', 0)->get();
        return Datatables::of($data)
        ->editColumn('avatar', function($index){
            if ($index->avatar) {
                return "<img src=".Storage::url($index->avatar)." width='40px' height='40px' />";
            }else {
                $ava     = new Avatar;
                return "<img src=".$ava->create($index->name)->toBase64() ." width='40px' height='40px' />";
            }
        })
        ->editColumn('gender',function($index){
            if ($index->gender == 'L') {
                return "<span class='badge badge-pill badge-primary'>Laki-Laki</span>";
            }else {
                return "<span class='badge badge-pill badge-danger'>Perempuan</span>";
            }
        })
        ->addColumn('action', function($index){
            $tag    = "<a href=". route('alumni.show', $index->id) ." class='btn btn-xs btn-warning text-white' ><i class='fa fa-search'></i></a> ";
            return $tag;
        })
        ->rawColumns([
            'id', 'avatar', 'gender', 'action'
        ])
        ->make(true);
    }

    public function show($id)
    {
        $data      = Student::findOrFail($id);
        $histories = ClassHistory::where('student_id',$id)->orderBy('created_at', 'desc')->first();
        $history   = ClassHistory::where('student_id',$id)->get();
        $classroom = Classroom::all();
        $years     = SchoolYear::all();
        return view($this->folder.'.show', compact('data', 'history', 'histories', 'classroom', 'years'));
    }

    public function updateProfile(Request $request, $id)
    {
        $cls      = Student::find($id)->classroom_id;
        $data     = Student::findOrFail($id)->update([
            'classroom_id' => $cls,
            'name'    => $request->name,
            'nisn'    => $request->nisn,
            'gender'    => $request->gender,
            'start_year'    => $request->start_year,
            'status'    => 0,
        ]);
        $ps     = ProfileStudent::where('student_id', $id)->exists();
        if ($ps) {
            ProfileStudent::findOrFail($id)->update([
                'nik'      => $request->nik,
                'address'  => $request->address,
                'religion' => $request->religion,
                'place_of_birth' => $request->place_of_birth,
                'date_of_birth' => $request->date_of_birth,
                'phone_number' => $request->phone_number
            ]);
        }else {
            $std     = Student::findOrFail($id);
            $prof     = new ProfileStudent;
            $prof->student_id = $std->id;
            $prof->nik = $request->nik;
            $prof->address = $request->address;
            $prof->religion = $request->religion;
            $prof->place_of_birth = $request->place_of_birth;
            $prof->date_of_birth = $request->date_of_birth;
            $prof->phone_number = $request->phone_number;
            $prof->save();
        }
        return redirect()->route('student.show',[$id])->with('notif', 'Data Informasi Siswa berhasil diubah');
    }

}
