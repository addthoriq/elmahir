<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ListCourse;
use Yajra\Datatables\Datatables;
use Form;

class ListCourseController extends Controller
{
    protected $folder     = 'admin.courses';
    protected $rdr        = '/course-detail';

    public function index()
    {
        $ajax     = route('detail.dbtb');
        return view('admin.courses.index', compact('ajax'));
    }

    public function dbTables(Request $request)
    {
        $data     = ListCourse::all();
        return Datatables::of($data)
        ->addColumn('action', function($index){
            $tag    = "<a href=". route('course-detail.show', $index->id) ." class='btn btn-xs btn-info' ><i class='fa fa-edit'></i> Edit</a> ";
            // $tag     = Form::open(["url"=>route('course.destroy', $index->id), "method" => "DELETE"]);
            // $tag    .= "<button type='submit' class='btn btn-xs btn-danger' onclick='javascript:return confirm(`Apakah anda yakin ingin menghapus data ini?`)' ><i class='fa fa-trash'></i> Hapus</button>";
            // $tag    .= Form::close();
            return $tag;
        })
        ->rawColumns([
            'id', 'action'
        ])
        ->make(true);
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name'=>['required']]);
        foreach ($request->name as $nm) {
            $mpl           = new ListCourse;
            $mpl->name     = $nm;
            $mpl->save();
        }
        return redirect($this->rdr)->with('notif', 'Daftar Mata Pelajaran berhasil ditambahkan');
    }

    public function show($id)
    {
        $data       = ListCourse::findOrFail($id);
        return view($this->folder.'.show', compact('data'));
    }

    public function update(Request $request, $id)
    {
        if ($request->name == ListCourse::findOrFail($id)->name) {
            return redirect()->route('course-detail.show', [$id])->with('notif', 'Tidak ada perubahan pada Daftar Mata Pelajaran');
        }else {
            ListCourse::findOrFail($id)->update([
                'name'     => $request->name
            ]);
            return redirect()->route('course-detail.index')->with('notif', 'Daftar Mata Pelajaran berhasil diubah');
        }
    }
}
