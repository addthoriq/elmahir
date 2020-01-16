<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Student;
use App\Model\Course;
use App\Model\ClassHistory;
use App\Model\ProfileStudent;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }
    protected $folder = 'student.profile';
    protected $rdr = '/students/profile';
    public function index()
    {
        $data = Student::findOrFail(Auth::user()->id);
        $ch = ClassHistory::where('student_id',Auth::user()->id)->first();
        return view($this->folder.'.index', compact('data', 'ch'));
    }
    public function update(Request $request)
    {
        if (empty($request->password)) {
            Student::find(Auth::user()->id)->update([
                'name'    => $request->name,
                'email'    => $request->email,
            ]);
        }else {
            Student::find(Auth::user()->id)->update([
                'name'    => $request->name,
                'email'    => $request->email,
                'password' => bcrypt($request->password),
            ]);
        }
        return redirect()->route('spr.index')->with('notif', 'Akun anda berhasil diubah');
    }
    public function updateProfile(Request $request)
    {
        $ps     = ProfileStudent::where('user_id', Auth::user()->id)->exists();
        if ($ps) {
            ProfileStudent::where('user_id',$u->id)->update([
                'nik'      => $request->nik,
                'address'  => $request->address,
                'religion' => $request->religion,
                'place_of_birth' => $request->place_of_birth,
                'date_of_birth' => $request->date_of_birth,
                'phone_number' => $request->phone_number
            ]);
        }else {
            $prof     = new ProfileStudent;
            $prof->user_id = Auth::user()->id;
            $prof->nik = $request->nik;
            $prof->address = $request->address;
            $prof->religion = $request->religion;
            $prof->place_of_birth = $request->place_of_birth;
            $prof->date_of_birth = $request->date_of_birth;
            $prof->phone_number = $request->phone_number;
            $prof->save();
        }
        return redirect()->route('spr.index')->with('notif', 'Data Informasi anda berhasil diubah');
    }
    public function updateAva(Request $request)
    {
        $user     = Student::findOrFail(Auth::user()->id);
        $ava      = $request->file('avatar');
        if ($ava) {
            if ($user->avatar && file_exists(storage_path('app/public/'.$user->avatar)) ) {
                \Storage::delete('public/'.$user->avatar);
            }
            $ava_path = $ava->store('ava_student', 'public'); //$ava->store('nama_folder', 'bersifat public')
            $user->avatar = $ava_path;
        }
        $user->save();
        return redirect()->route('spr.index')->with('notif', 'Poto Profil anda berhasil diubah');
    }
    public function unon(Request $request)
    {
        // if (Gate::allows('update-nonuser')) {
            Student::findOrFail(Auth::user()->id)->update([
                'status'    => 0,
            ]);
            $data = Student::findOrFail(Auth::user()->id);
            return redirect($this->rdr)->with('notif', 'Akun anda berhasil di tutup!');
        // }else {
        //     abort(403);
        // }
    }
}
