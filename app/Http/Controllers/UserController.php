<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Role;
use Yajra\Datatables\Datatables;
use Form;

class UserController extends Controller
{
    protected $folder     = 'pages.users';
    protected $rdr        = '/user';
    protected $edit       = '/user/edit';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ajax     = route('user.dbtb');
        return view('pages.users.index', compact('ajax'));
    }

    public function dbTables(Request $request)
    {
        $data = User::all();
        return Datatables::of($data)
        ->editColumn('role_id',function($index){
            if ($index->role_id === 1) {
                return "<span class='label label-warning'>Admin</span>";
            }elseif ($index->role_id === 2) {
                return "<span class='label label-primary'>Operator 1</span>";
            }else {
                return "<span class='label label-success'>Operator 2</span>";
            }
        })
        ->editColumn('status', function($index){
            return ($index->status)?"<span class='label label-primary'>Aktif</span>":"<span class='label label-danger'>Tidak Aktif</span>";
        })
        ->addColumn('action', function($index){
            $tag     = Form::open(["url"=>route('user.destroy', $index->id), "method" => "DELETE"]);
            $tag    .= "<a href=". route('user.show', $index->id) ." class='btn btn-xs btn-info' ><i class='fa fa-search'></i> Detail</a> ";
            $tag    .= "<button type='submit' class='btn btn-xs btn-danger' onclick='javascript:return confirm(`Apakah anda yakin ingin menghapus data ini?`)' ><i class='fa fa-trash'></i> Hapus</button>";
            $tag    .= Form::close();
            return $tag;
        })
        ->rawColumns([
            'id', 'role_id', 'status', 'action'
        ])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view($this->folder.'.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data     = new User;
        $data->role_id = $request->role_id;
        $data->name    = $request->name;
        $data->email   = $request->email;
        $data->password = bcrypt($request->password);
        $ava  = $request->file('avatar');
        if ($ava) {
            $ava_path = $ava->store('ava_user', 'public'); //$ava->store('nama_folder', 'bersifat public')
            $data->avatar = $ava_path;
        }
        $data->status   = 1;
        $data->save();
        return redirect($this->rdr)->with('notif', 'Data User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roles     = Role::all();
        $data     = User::find($id);
        return view($this->folder.'.show', compact('data', 'roles'));
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
        if (empty($request->password)) {
            User::find($id)->update([
                'role_id'  => $request->role_id,
                'name'     => $request->name,
                'email'    => $request->email,
                'status'   => $request->status,
            ]);
        }else {
            User::find($id)->update([
                'role_id'  => $request->role_id,
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => bcrypt($request->password),
                'status'   => $request->status,
            ]);
        }
        return redirect()->route('user.show', [$id])->with('notif', 'Informasi Profil berhasil diubah');
    }

    /**
     * Update the avatar resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        return redirect()->route('user.show', [$id])->with('notif', 'Poto Profil berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data     = User::findOrFail($id);
        $data->delete();
        return redirect($this->rdr)->with('notif', 'Data User berhasil dihapus');
    }
}
