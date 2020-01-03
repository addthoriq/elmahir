<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Role;
use Illuminate\Support\Str;

class RoleController extends Controller
{
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
        $roles     = Role::all();
        return view($this->folder.'.perm-500', compact('roles'));
    }
    public function ubah(Request $request, $id)
    {
        Role::findOrFail($id)->update([
            'name'     => $request->name,
            'slug'     => Str::slug($request->name,'-')
        ]);
        return redirect('/perm')->with('notif', 'Hak Akses berhasil diubah');
    }
}
