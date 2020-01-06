<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Role;
use App\Model\Permission;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $folder     = 'admin.roles';
    public function index()
    {
        $roles     = Role::all();
        return view($this->folder.'.index', compact('roles'));
    }
    public function update(Request $request, $id)
    {
        Role::findOrFail($id)->update([
            'name'     => $request->name,
            'slug'     => Str::slug($request->name,'-')
        ]);
        return redirect('/role')->with('notif', 'Role berhasil diubah');
    }
    public function home()
    {
        $roles     = Role::get();
        $perms     = Permission::get();
        return view($this->folder.'.perm-index', compact('roles', 'perms'));
    }
    public function ubah(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->permissions()->sync($request->permissions);
        return redirect('/perm')->with('notif', 'Hak Akses berhasil diubah');
    }
}
