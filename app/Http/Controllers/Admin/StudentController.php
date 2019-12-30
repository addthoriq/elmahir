<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Model\Student;
use App\Model\ProfileStudent;
use App\Model\SchoolYear;
use App\Model\Classroom;
use App\Model\ClassHistory;
use Yajra\Datatables\Datatables;
use Form;
use Illuminate\Support\Facades\Storage;
use Laravolt\Avatar\Avatar;

class StudentController extends Controller
{
    protected $folder     = 'admin.students';
    protected $rdr        = '/student';

    public function index()
    {
        $ajax     = route('student.dbtb');
        return view($this->folder.'.index', compact('ajax'));
    }

    public function dbTables(Request $request)
    {
        $data     = Student::where('status', 1)->get();
        return Datatables::of($data)
        ->editColumn('avatar', function($index){
            if ($index->avatar) {
                return "<img class='rounded-circle' src=".Storage::url($index->avatar)." width='40px' height='40px' />";
            }else {
                $ava     = new Avatar;
                return "<img class='rounded-circle' src=".$ava->create($index->name)->toBase64() ." width='40px' height='40px' />";
            }
        })
        ->editColumn('gender',function($index){
            if ($index->gender == 'L') {
                return "<span class='label label-primary'>Laki-Laki</span>";
            }else {
                return "<span class='label label-success'>Perempuan</span>";
            }
        })
        ->addColumn('classroom', function($index){
            $ch    = Student::findOrFail($index->id)->classroom->name;
            return $ch;
        })
        ->addColumn('action', function($index){
            $tag     = Form::open(["url"=>route('student.alumni', $index->id), "method" => "PUT"]);
            $tag    .= "<a href=". route('student.show', $index->id) ." class='btn btn-xs btn-info' ><i class='fa fa-search'></i> Detail</a> ";
            $tag    .= "<button type='submit' class='btn btn-xs btn-danger' onclick='javascript:return confirm(`Apakah anda yakin ingin menjadikan siswa ini Alumni?`)' ><i class='fa fa-graduation-cap'></i> Lulus</button>";
            $tag    .= Form::close();
            return $tag;
        })
        ->rawColumns([
            'id', 'avatar', 'gender', 'action'
        ])
        ->make(true);
    }

    public function create()
    {
        $years     = SchoolYear::where('status',1)->get();
        $classes     = Classroom::all();
        return view($this->folder.'.create', compact('years', 'classes'));
    }

    public function store(StudentRequest $request)
    {
        $data     = new Student;
        $data->classroom_id = $request->classroom_id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->nisn     = $request->nisn;
        $data->gender   = $request->gender;
        $data->start_year   = $request->start_year;
        $ava     = $request->file('avatar');
        if ($ava) {
            $ava_path     = $ava->store('ava_student', 'public');
            $data->avatar = $ava_path;
        }
        $data->status   = 1;
        $data->save();
        $kelas     = new ClassHistory;
        $kelas->student_id = $data->id;
        $kelas->school_year_id = $request->school_year_id;
        $kelas->classroom_id = $request->classroom_id;
        $kelas->status     = 1;
        $kelas->save();
        return redirect($this->rdr)->with('notif', 'Data Siswa berhasil ditambahkan');
    }

    public function show($id)
    {
        $data      = Student::findOrFail($id);
        $cata      = Classroom::all();
        $histories = ClassHistory::where('student_id',$id)->orderBy('created_at', 'desc')->first();
        $history   = ClassHistory::where('student_id',$id)->get();
        $classroom = Classroom::all();
        $years     = SchoolYear::all();
        return view($this->folder.'.show', compact('data', 'history', 'histories', 'classroom', 'years'));
    }

    public function update(Request $request, $id)
    {
        if (empty($request->password)) {
            Student::find($id)->update([
                'email'    => $request->email
            ]);
        }else {
            Student::find($id)->update([
                'email'    => $request->email,
                'password'    => bcrypt($request->password)
            ]);
        }
        return redirect()->route('student.show', [$id])->with('notif', 'Akun Login berhasil diubah');
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
            'status'    => 1,
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

    public function updateAva(Request $request, $id)
    {
        $data     = Student::findOrFail($id);
        $ava      = $request->file('avatar');
        if ($ava) {
            if ($data->avatar && file_exists(storage_path('app/public/'.$data->avatar)) ) {
                \Storage::delete('public/'.$data->avatar);
            }
            $ava_path = $ava->store('ava_student', 'public'); //$ava->store('nama_folder', 'bersifat public')
            $data->avatar = $ava_path;
        }
        $data->save();
        return redirect()->route('student.show', [$id])->with('notif', 'Poto Profil berhasil diubah');
    }

    public function updateClassHis(Request $request, $id)
    {
        if ($request->status == 0) {
            ClassHistory::where('student_id', $id)->update([
                'status' => 0,
            ]);
        }else {
            Student::findOrFail($id)->update([
                'classroom_id'    => $request->classroom_id
            ]);
            $data                  = new ClassHistory;
            $data->student_id      = $id;
            $data->school_year_id  = $request->school_year_id;
            $data->classroom_id    = $request->classroom_id;
            $data->status          = 1;
            $data->save();
        }
        return redirect()->route('student.show', [$id])->with('notif', 'Data Kelas berhasil diubah');
    }

    public function alumni(Request $request, $id)
    {
        Student::findOrFail($id)->update([
            'status'    => 0
        ]);
        ClassHistory::where('student_id', $id)->update([
            'status'    => 0,
        ]);
        $data = Student::findOrFail($id);
        return redirect($this->rdr)->with('notif', $data->name.' telah menjadi Alumnus');
    }

    public function destroy($id)
    {
        $data     = Student::findOrFail($id);
        $data->delete();
        return redirect($this->rdr)->with('notif', 'Data Akun dan Informasi Siswa berhasil dihapus');
    }
}
