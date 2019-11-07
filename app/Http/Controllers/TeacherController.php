<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Teacher;
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
        $data     = Teacher::all();
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
            $tag     = Form::open(["url"=>route('teacher.destroy', $index->id), "method" => "DELETE"]);
            $tag    .= "<a href=". route('teacher.show', $index->id) ." class='btn btn-xs btn-info' ><i class='fa fa-search'></i> Detail</a> ";
            $tag    .= "<button type='submit' class='btn btn-xs btn-danger' onclick='javascript:return confirm(`Apakah anda yakin ingin menghapus data ini?`)' ><i class='fa fa-trash'></i> Hapus</button>";
            $tag    .= Form::close();
            return $tag;
        })
        ->rawColumns([
            'id', 'avatar', 'gender', 'action'
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
        return view('pages.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data               = new Teacher;
        $data->nisn         = $request->nisn;
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
        return redirect($this->rdr)->with('notif', 'Data Guru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data      = Teacher::findOrFail($id);
        return view($this->folder.'.show', compact('data'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
