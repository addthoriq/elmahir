<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequests;
use App\Model\User;
use App\Model\ProfileUser;
use App\Model\Role;
use Yajra\Datatables\Datatables;
use Form;

class UserController extends Controller
{
    protected $folder     = 'admin.users';
    protected $rdr        = '/user';
    protected $edit       = '/user/edit';

    public function index()
    {
        $ajax     = route('user.dbtb');
        return view('admin.users.index', compact('ajax'));
    }

    public function dbTables(Request $request)
    {
        $data = User::all();
        return Datatables::of($data)
        ->editColumn('role_id',function($index){
            if ($index->role_id === 1) {
                return "<span class='badge badge-pill badge-warning text-white'>Admin</span>";
            }elseif ($index->role_id === 2) {
                return "<span class='badge badge-pill badge-info'>Operator 1</span>";
            }elseif ($index->role_id === 3) {
                return "<span class='badge badge-pill badge-success text-white'>Operator 2</span>";
            }elseif ($index->role_id === 4) {
                return "<span class='badge badge-pill badge-primary text-white'>Pengajar</span>";
            }else {
                return "<span class='badge badge-pill badge-light'>Pegawai</span>";
            }
        })
        ->editColumn('status', function($index){
            return ($index->status)?"<span class='badge badge-pill badge-success text-white'>Aktif</span>":"<span class='badge badge-pill badge-danger'>Tidak Aktif</span>";
        })
        ->addColumn('action', function($index){
            if (!$index->status) {
                $tag     = Form::open(["url"=>route('user.aktif', $index->id), "method" => "PUT"]);
                $tag    .= "<a href=". route('user.show', $index->id) ." class='btn btn-xs btn-warning text-white' ><i class='fa fa-search'></i></a> ";
                $tag    .= "<button type='submit' class='btn btn-xs btn-info' onclick='javascript:return confirm(`Apakah anda yakin ingin mengaktifkan ".$index->name." ?`)' ><i class='fa fa-check'></i></button>";
                $tag    .= Form::close();
                return $tag;
            }else {
                $tag     = Form::open(["url"=>route('user.unon', $index->id), "method" => "PUT"]);
                $tag    .= "<a href=". route('user.show', $index->id) ." class='btn btn-xs btn-warning text-white' ><i class='fa fa-search'></i></a> ";
                $tag    .= "<button type='submit' class='btn btn-xs btn-danger' onclick='javascript:return confirm(`Apakah anda yakin ingin menonaktifkan ".$index->name." ?`)' ><i class='fa fa-minus-square'></i></button>";
                $tag    .= Form::close();
                return $tag;
            }
        })
        ->rawColumns([
            'id', 'role_id', 'status', 'action',
        ])
        ->make(true);
    }

    public function create()
    {
        $roles = Role::all();
        return view($this->folder.'.create', compact('roles'));
    }

    public function store(UserRequests $request)
    {
        $data             = new User;
        $data->role_id    = $request->role_id;
        $data->nip        = $request->nip;
        $data->start_year = $request->start_year;
        $data->gender     = $request->gender;
        $data->name       = $request->name;
        $data->email      = $request->email;
        $data->password   = bcrypt($request->password);
        $ava  = $request->file('avatar');
        if ($ava) {
            $ava_path = $ava->store('ava_user', 'public'); //$ava->store('nama_folder', 'bersifat public')
            $data->avatar = $ava_path;
        }
        $data->status   = 1;
        $data->save();
        return redirect($this->rdr)->with('notif', 'Data User berhasil ditambahkan');
    }

    public function show($id)
    {
        $roles     = Role::all();
        $data      = User::find($id);
        return view($this->folder.'.show', compact('data', 'roles'));
    }

    public function update(Request $request, $id)
    {
        if (empty($request->password)) {
            User::find($id)->update([
                'role_id'  => $request->role_id,
                'email'    => $request->email,
            ]);
        }else {
            User::find($id)->update([
                'role_id'  => $request->role_id,
                'email'    => $request->email,
                'password' => bcrypt($request->password),
            ]);
        }
        $data     = User::findOrFail($id);
        return redirect()->route('user.show', [$id])->with('notif', 'Informasi '.$data->name.' berhasil diubah');
    }

    public function updateProfile(Request $request, $id)
    {
        $data     = User::findOrFail($id)->update([
            'name'    => $request->name,
            'nip'    => $request->nip,
            'gender'    => $request->gender,
            'start_year'    => $request->start_year,
            'status'    => $request->status,
        ]);
        $ps     = ProfileUser::where('teacher_id', $id)->exists();
        if ($ps) {
            ProfileUser::findOrFail($id)->update([
                'nik'      => $request->nik,
                'address'  => $request->address,
                'religion' => $request->religion,
                'place_of_birth' => $request->place_of_birth,
                'date_of_birth' => $request->date_of_birth,
                'phone_number' => $request->phone_number
            ]);
        }else {
            $std     = User::findOrFail($id);
            $prof     = new ProfileUser;
            $prof->teacher_id = $std->id;
            $prof->nik = $request->nik;
            $prof->address = $request->address;
            $prof->religion = $request->religion;
            $prof->place_of_birth = $request->place_of_birth;
            $prof->date_of_birth = $request->date_of_birth;
            $prof->phone_number = $request->phone_number;
            $prof->save();
        }
        $guru     = User::findOrFail($id);
        return redirect()->route('teacher.show',[$id])->with('notif', 'Data Informasi '.$guru->name.' berhasil diubah');
    }

    public function updateAva(Request $request, $id)
    {
        $user     = User::findOrFail($id);
        $ava      = $request->file('avatar');

        if ($ava) {
            if ($user->avatar && file_exists(storage_path('app/public/'.$user->avatar)) ) {
                \Storage::delete('public/'.$user->avatar);
            }
            $ava_path = $ava->store('ava_user', 'public'); //$ava->store('nama_folder', 'bersifat public')
            $user->avatar = $ava_path;
        }
        $user->save();
        return redirect()->route('user.show', [$id])->with('notif', 'Poto Profil '.$user->name.' berhasil diubah');
    }

    public function aktif(Request $request, $id)
    {
        User::findOrFail($id)->update([
            'status'    => 1,
        ]);
        $data = User::findOrFail($id);
        return redirect($this->rdr)->with('notif', $data->name.' berhasil di aktifkan!');
    }

    public function unon(Request $request, $id)
    {
        User::findOrFail($id)->update([
            'status'    => 0,
        ]);
        $data = User::findOrFail($id);
        return redirect($this->rdr)->with('notif', $data->name.' berhasil di nonaktifkan!');
    }

    public function destroy($id)
    {
        $data     = User::findOrFail($id);
        $data->delete();
        return redirect($this->rdr)->with('notif', $data->name.' berhasil dihapus');
    }
}
