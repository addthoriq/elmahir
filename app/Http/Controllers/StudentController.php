<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    protected $folder     = 'pages.students';
    protected $rdr        = '/student';

    public function index()
    {
        $ajax     = route('student.dbtb');
        return view('pages.students.index', compact('ajax'));
    }

    public function dbTables(Request $request)
    {
        $data     = Student::all();
        return Datatables::of($data)
        ->editColumn('avatar', function($index){
            if ($index->avatar) {
                return "<img class='rounded-circle' src=".Storage::url($index->avatar)." width='38px' height='38px' />";
            }else {
                $ava     = new Avatar;
                return "<img class='rounded-circle' src=".$ava->create($index->name)->toBase64() ." width='38px' height='38px' />";
            }
        })
        ->editColumn('gender',function($index){
            if ($index->gender == 'L') {
                return "<span class='label label-primary'>Laki-Laki</span>";
            }else {
                return "<span class='label label-success'>Perempuan</span>";
            }
        })
        ->addColumn('action', function($index){
            $tag     = Form::open(["url"=>route('student.destroy', $index->id), "method" => "DELETE"]);
            $tag    .= "<a href=". route('student.show', $index->id) ." class='btn btn-xs btn-info' ><i class='fa fa-search'></i> Detail</a> ";
            $tag    .= "<button type='submit' class='btn btn-xs btn-danger' onclick='javascript:return confirm(`Apakah anda yakin ingin menghapus data ini?`)' ><i class='fa fa-trash'></i> Hapus</button>";
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
        $years     = SchoolYear::all();
        $classes     = Classroom::all();
        return view($this->folder.'.create', compact('years', 'classes'));
    }

    public function store(Request $request)
    {
        $data     = new Student;
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
        $kelas->school_year_id = $request->school_year_id;
        $kelas->class_id = $request->class_id;
        $kelas->student_id = $data->id;
        $kelas->status     = 1;
        $kelas->save();
        return redirect($this->rdr)->with('notif', 'Data Siswa berhasil ditambahkan');
    }

    public function show($id)
    {
        $data      = Student::findOrFail($id);
        $histories = ClassHistory::find($id);
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
        $data     = Student::findOrFail($id)->update([
            'name'    => $request->name,
            'nisn'    => $request->nisn,
            'gender'    => $request->gender,
            'start_year'    => $request->start_year,
            'status'    => $request->status,
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
        return redirect()->route('student.show',[$id])->with('status', 'Data Informasi Siswa berhasil diubah');
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
        $data                  = new ClassHistory;
        $data->student_id      = $id;
        $data->school_year_id  = $request->school_year_id;
        $data->class_id        = $request->class_id;
        if ($request->status) {
            $data->status          = 1;
        }else {
            ClassHistory::where('student_id', $id)->update([
                'status'    => $request->status,
            ]);
        }
        $data->save();
        return redirect()->route('student.show', [$id])->with('notif', 'Data Kelas berhasil diubah');
    }

    public function destroy($id)
    {
        $data     = Student::findOrFail($id);
        $data->delete();
        return redirect($this->rdr)->with('notif', 'Data Akun dan Informasi Siswa berhasil dihapus');
    }
}
