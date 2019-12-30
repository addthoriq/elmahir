<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ListCourse;
use Yajra\Datatables\Datatables;
use Form;

class ListCourseController extends Controller
{
    protected $folder     = 'admin.listCourses';
    protected $rdr        = '/list-course';

    public function index()
    {
        $ajax     = route('listCourse.dbtb');
        return view($this->folder.'.index', compact('ajax'));
    }

    public function dbTables(Request $request)
    {
        $data     = ListCourse::all();
        return Datatables::of($data)
        ->addColumn('action', function($index){
            $tag     = Form::open(["url"=>route('list-course.destroy', $index->id), "method" => "DELETE"]);
            $tag    .= "<a href=". route('list-course.show', $index->id) ." class='btn btn-xs btn-warning text-white' ><i class='fa fa-search'></i></a> ";
            $tag    .= "<button type='submit' class='btn btn-xs btn-danger' onclick='javascript:return confirm(`Apakah anda yakin ingin menghapus mata pelajaran ".$index->name."?`)' ><i class='fas fa-trash'></i></button>";
            $tag    .= Form::close();
            return $tag;
        })
        ->rawColumns([
            'id', 'action'
        ])
        ->make(true);
    }

    public function create()
    {
        return view($this->folder.'.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name'=>['required']]);
        foreach ($request->name as $nm) {
            $mpl           = new ListCourse;
            $mpl->name     = $nm;
            $mpl->slug     = \Str::slug($nm, '-');
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
            return redirect()->route('list-course.show', [$id])->with('notif', 'Tidak ada perubahan pada Daftar Mata Pelajaran');
        }else {
            ListCourse::findOrFail($id)->update([
                'name'     => $request->name,
                'slug'     => \Str::slug($request->name, '-')
            ]);
            return redirect()->route('list-course.index')->with('notif', 'Daftar Mata Pelajaran berhasil diubah');
        }
    }

    public function destroy($id)
    {
        // code...
    }
}
