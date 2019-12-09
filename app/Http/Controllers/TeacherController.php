<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;
use App\Model\User;
use App\Model\Role;
use App\Model\Teacher;
use App\Model\SchoolYear;
use App\Model\TeacherHistory;
use App\Model\ProfileTeacher;
use Yajra\Datatables\Datatables;
use Form;
use Illuminate\Support\Facades\Storage;
use Laravolt\Avatar\Avatar;

class TeacherController extends Controller
{
    protected $folder     = 'pages.teachers';
    protected $rdr        = '/teacher';

    public function index()
    {
        $ajax     = route('teacher.dbtb');
        return view('pages.teachers.index', compact('ajax'));
    }

    public function dbTables(Request $request)
    {
        $data     = Teacher::where('status',1)->get();
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
        ->addColumn('action', function($index){
            $tag     = Form::open(["url"=>route('teacher.nonaktif', $index->id), "method" => "PUT"]);
            $tag    .= "<a href=". route('teacher.show', $index->id) ." class='btn btn-xs btn-info' ><i class='fa fa-search'></i> Detail</a> ";
            $tag    .= "<button type='submit' class='btn btn-xs btn-danger' onclick='javascript:return confirm(`Apakah anda yakin ingin menonaktifkan ".$index->name." dari guru?`)' ><i class='fa fa-minus-square'></i> Nonaktifkan</button>";
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
        return view('pages.teachers.create');
    }

    public function store(TeacherRequest $request)
    {
        dd($request->all());
        $data               = new Teacher;
        $data->nip         = $request->nip;
        $data->name         = $request->name;
        $data->start_year   = $request->start_year;
        $data->gender       = $request->gender;
        $data->email        = $request->email;
        $data->password     = bcrypt($request->password);
        $ava                = $request->file('avatar');
        if ($ava) {
            $ava_path       = $ava->store('ava_teacher', 'public');
            $data->avatar   = $ava_path;
        }
        $data->status       = 1;
        $data->save();
        $mapel              = new TeacherHistory;
        $mapel->teacher_id  = $data->id;
        $mapel->classroom_id = $request->classroom_id;
        $mapel->school_year_id = $request->school_year_id;
        $mapel->course_id   = $request->course_id;
        $mapel->status = 1;
        $mapel->save();
        return redirect($this->rdr)->with('notif', 'Data Guru berhasil ditambahkan');
    }

    public function show($id)
    {
        $admin     = Role::findOrFail(1);
        $op1       = Role::findOrFail(2);
        $op2       = Role::findOrFail(3);
        $user      = User::where('teacher_id', $id)->exists();
        $usr       = User::where('teacher_id', $id)->first();
        $data      = Teacher::findOrFail($id);
        $years     = SchoolYear::all();
        $histories = TeacherHistory::where('teacher_id', $id)->orderBy('created_at', 'desc')->first();
        $history   = TeacherHistory::where('teacher_id', $id)->get();
        return view($this->folder.'.show', compact('data', 'admin', 'op1', 'op2', 'user', 'usr', 'histories', 'history', 'years'));
    }

    public function update(TeacherRequest $request, $id)
    {
        if (empty($request->password)) {
            Teacher::find($id)->update([
                'email'    => $request->email
            ]);
        }else {
            Teacher::find($id)->update([
                'email'    => $request->email,
                'password'    => bcrypt($request->password)
            ]);
        }
        $guru     = Teacher::findOrFail($id);
        return redirect()->route('teacher.show', [$id])->with('notif', 'Akun Login '.$guru->name.' berhasil diubah');
    }

    public function admin(Request $request, $id)
    {
        $data     = Teacher::findOrFail($id);
        $datu     = User::where('teacher_id', $id)->exists();
        if ($data->id == $datu) {
            User::where('teacher_id', $id)->update([
                'role_id'    => $request->role_id,
                'email'      => $request->email,
                'password'   => bcrypt($request->password)
            ]);
            return redirect()->route('teacher.show',[$id])->with('notif', $data->name.' berhasil diubah menjadi Admin');
        }else {
            $user     = new User;
            $user->role_id = 1;
            $user->teacher_id = $data->id;
            $user->name    = $data->name;
            $user->email   = $data->email;
            $ps       = $request->password;
            if ($ps) {
                $user->password = bcrypt($ps);
            }else {
                $user->password = $data->password;
            }
            $user->avatar = $data->avatar;
            $user->status   = 1;
            $user->save();
            return redirect()->route('teacher.show',[$id])->with('notif', 'Data User berhasil ditambahkan menjadi Admin');
        }
    }
    public function op(Request $request, $id)
    {
        $data     = Teacher::findOrFail($id);
        $datu     = User::where('teacher_id', $id)->exists();
        if ($data->id == $datu) {
            User::where('teacher_id', $id)->update([
                'role_id'    => $request->role_id,
                'email'      => $request->email,
                'password'   => bcrypt($request->password)
            ]);
            return redirect()->route('teacher.show',[$id])->with('notif', $data->name.' berhasil diubah menjadi Operator 1');
        }else {
            $user     = new User;
            $user->role_id = 2;
            $user->teacher_id = $data->id;
            $user->name    = $data->name;
            $user->email   = $data->email;
            $ps       = $request->password;
            if ($ps) {
                $user->password = $ps;
            }else {
                $user->password = $data->password;
            }
            $user->avatar = $data->avatar;
            $user->status   = 1;
            $user->save();
            return redirect()->route('teacher.show',[$id])->with('notif', 'Data User berhasil ditambahkan menjadi Operator 1');
        }
    }

    public function ope(Request $request, $id)
    {
        $data     = Teacher::findOrFail($id);
        $datu     = User::where('teacher_id', $id)->exists();
        if ($data->id == $datu) {
            User::where('teacher_id', $id)->update([
                'role_id'    => $request->role_id,
                'email'      => $request->email,
                'password'   => bcrypt($request->password)
            ]);
            return redirect()->route('teacher.show',[$id])->with('notif', $data->name.' berhasil diubah menjadi Operator 2');
        }else {
            $user     = new User;
            $user->role_id = 3;
            $user->teacher_id = $data->id;
            $user->name    = $data->name;
            $user->email   = $data->email;
            $ps       = $request->password;
            if ($ps) {
                $user->password = $ps;
            }else {
                $user->password = $data->password;
            }
            $user->avatar = $data->avatar;
            $user->status   = 1;
            $user->save();
            return redirect()->route('teacher.show',[$id])->with('notif', 'Data User berhasil ditambahkan menjadi Operator 2');
        }
    }

    public function nonRole($id)
    {
        User::where('teacher_id',$id)->update([
            'status'    => 0
        ]);
        $data     = User::where('teacher_id', $id)->first();
        return redirect()->route('teacher.show',[$id])->with('notif', $data->name.' berhasil dinonaktifkan dari User');
    }

    public function updateProfile(Request $request, $id)
    {
        $data     = Teacher::findOrFail($id)->update([
            'name'    => $request->name,
            'nip'    => $request->nip,
            'gender'    => $request->gender,
            'start_year'    => $request->start_year,
            'status'    => $request->status,
        ]);
        $ps     = ProfileTeacher::where('teacher_id', $id)->exists();
        if ($ps) {
            ProfileTeacher::findOrFail($id)->update([
                'nik'      => $request->nik,
                'address'  => $request->address,
                'religion' => $request->religion,
                'place_of_birth' => $request->place_of_birth,
                'date_of_birth' => $request->date_of_birth,
                'phone_number' => $request->phone_number
            ]);
        }else {
            $std     = Teacher::findOrFail($id);
            $prof     = new ProfileTeacher;
            $prof->teacher_id = $std->id;
            $prof->nik = $request->nik;
            $prof->address = $request->address;
            $prof->religion = $request->religion;
            $prof->place_of_birth = $request->place_of_birth;
            $prof->date_of_birth = $request->date_of_birth;
            $prof->phone_number = $request->phone_number;
            $prof->save();
        }
        $guru     = Teacher::findOrFail($id);
        return redirect()->route('teacher.show',[$id])->with('notif', 'Data Informasi '.$guru->name.' berhasil diubah');
    }

    public function updateAva(Request $request, $id)
    {
        $data     = Teacher::findOrFail($id);
        $ava      = $request->file('avatar');
        if ($ava) {
            if ($data->avatar && file_exists(storage_path('app/public/'.$data->avatar)) ) {
                \Storage::delete('public/'.$data->avatar);
            }
            $ava_path = $ava->store('ava_teacher', 'public'); //$ava->store('nama_folder', 'bersifat public')
            $data->avatar = $ava_path;
        }
        $data->save();
        return redirect()->route('teacher.show', [$id])->with('notif', 'Poto Profil '.$data->name.' berhasil diubah');
    }

    public function nonCourse(Request $request, $id)
    {
        TeacherHistory::where('teacher_id', $id)->update([
            'status'    => 0
        ]);
        return redirect()->route('teacher.show', [$id])->with('notif', 'Riwayat Mata Pelajaran berhasil di akhiri');
    }

    public function onCourse(Request $request, $id)
    {
        TeacherHistory::where('teacher_id', $id)->update([
            'status'    => 1
        ]);
        return redirect()->route('teacher.show', [$id])->with('notif', 'Riwayat Mata Pelajaran berhasil di aktifkan');
    }

    public function nonaktif(Request $request, $id)
    {
        Teacher::findOrFail($id)->update([
            'status'    => 0,
        ]);
        $user = User::where('teacher_id',$id)->exists();
        if ($user) {
            User::where('teacher_id', $id)->delete();
        }
        $data = Teacher::findOrFail($id);
        return redirect($this->rdr)->with('notif', $data->name.' berhasil di nonaktifkan!');
    }
}
