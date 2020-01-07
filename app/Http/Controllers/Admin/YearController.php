<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\SchoolYear;
use App\Model\ClassHistory;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Form;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;


class YearController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $folder  = 'admin.years';
    protected $rdr     = '/year';
    public function index()
    {
        if (Gate::allows('index-schoolyear')) {
            $ajax     = route('year.dbtb');
            return view('admin.years.index', compact('ajax'));
        }else {
            abort(403);
        }
    }
    public function dbTables(Request $request)
    {
        $data = SchoolYear::all();
        return Datatables::of($data)
        ->editColumn('status', function($index){
            return ($index->status)?'<span class="badge badge-pill badge-success text-white">Saat ini</span>':'<span class="badge badge-pill badge-danger">Telah berakhir</span>';
        })
        ->addColumn('action', function($index){
            $tag     = Form::open(["url"=>route('year.update', $index->id), "method" => "PUT"]);
            $tag    .= "<a href=". route('year.show', $index->id) ." class='btn btn-xs btn-warning text-white' ><i class='fa fa-search'></i></a> ";
            if ($index->status) {
                $tag    .= "<button type='submit' class='btn btn-xs btn-danger' onclick='javascript:return confirm(`Apakah anda yakin ingin mengakhiri Tahun Ajaran ini?`)' ><i class='fa fa-minus-square'></i></button>";
            }
            $tag    .= Form::close();
            return $tag;
        })
        ->rawColumns([
            'id', 'status','action'
        ])
        ->make(true);
    }
    public function store(Request $request)
    {
        if (Gate::allows('create-schoolyear')) {
            $data     = new SchoolYear;
            $data->start_year     = $request->start_year;
            $data->end_year     = $request->end_year;
            $data->status     = $request->status;
            $data->save();
            return redirect($this->rdr)->with('status','Tahun Ajar berhasil ditambahkan');
        }else {
            abort(403);
        }
    }
    public function show($id)
    {
        if (Gate::allows('update-schoolyear')) {
            $data     = SchoolYear::findOrFail($id);
            return view($this->folder.'.show', compact('data'));
        }else {
            abort(403);
        }
    }
    public function update(Request $request, $id)
    {
        if (Gate::allows('update-schoolyear')) {
            SchoolYear::findOrFail($id)->update([
                'status'    => 0,
            ]);
            ClassHistory::where('status',1)->update([
                'status'    => 0
            ]);
            return redirect($this->rdr)->with('notif', 'Tahun Ajar berhasil diubah');
        }else {
            abort(403);
        }
    }
    public function destroy($id)
    {
        $data = SchoolYear::findOrFail($id);
        $data->delete();
        return redirect($this->rdr)->with('notif', 'Tahun Ajar berhasil dihapus');
    }
}
