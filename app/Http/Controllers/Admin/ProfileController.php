<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\ProfileUser;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected $folder = 'admin.profile';
    protected $rdr = '/profile';
    public function index($id)
    {
        $data = User::findOrFail($id);
        return view($this->folder.'.index', compact('data'));
    }
    public function update(Request $request, $id)
    {
        if (empty($request->password)) {
            User::find($id)->update([
                'email'    => $request->email,
            ]);
        }else {
            User::find($id)->update([
                'email'    => $request->email,
                'password' => bcrypt($request->password),
            ]);
        }
        $data     = User::findOrFail($id);
        return redirect()->route('profile.index', [$id])->with('notif', 'Akun anda berhasil diubah');
    }
    public function updateProfile(Request $request, $id)
    {
        $u = User::findOrFail($id);
        $data     = User::findOrFail($id)->update([
            'name'    => $request->name,
            'nip'    => $request->nip,
            'gender'    => $u->gender,
            'start_year'    => $request->start_year,
            'status'    => $u->status,
        ]);
        $ps     = ProfileUser::where('user_id', $id)->exists();
        if ($ps) {
            ProfileUser::where('user_id',$u->id)->update([
                'nik'      => $request->nik,
                'address'  => $request->address,
                'religion' => $request->religion,
                'place_of_birth' => $request->place_of_birth,
                'date_of_birth' => $request->date_of_birth,
                'phone_number' => $request->phone_number
            ]);
        }else {
            $prof     = new ProfileUser;
            $prof->user_id = $u->id;
            $prof->nik = $request->nik;
            $prof->address = $request->address;
            $prof->religion = $request->religion;
            $prof->place_of_birth = $request->place_of_birth;
            $prof->date_of_birth = $request->date_of_birth;
            $prof->phone_number = $request->phone_number;
            $prof->save();
        }
        return redirect()->route('profile.index',[$id])->with('notif', 'Data Informasi anda berhasil diubah');
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
        return redirect()->route('profile.index', [$id])->with('notif', 'Poto Profil anda berhasil diubah');
    }
    public function unon(Request $request, $id)
    {
        // if (Gate::allows('update-nonuser')) {
            User::findOrFail($id)->update([
                'status'    => 0,
            ]);
            $data = User::findOrFail($id);
            return redirect($this->rdr)->with('notif', 'Akun anda berhasil di tutup!');
        // }else {
        //     abort(403);
        // }
    }
}
