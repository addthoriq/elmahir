<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Student;
use Laravolt\Avatar\Avatar;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;
use App\Model\ClassHistory;
use App\Model\Classroom;
use App\Model\SchoolYear;

class AlumnusController extends Controller
{
    protected $folder      = 'pages.alumni';
    public function index()
    {
        $ajax     = route('alumni.dbtb');
        return view($this->folder.'.index', compact('ajax'));
    }

    public function dbTables(Request $request)
    {
        $data     = Student::where('status', 0)->get();
        return Datatables::of($data)
        ->editColumn('avatar', function($index){
            if ($index->avatar) {
                return "<img src=".Storage::url($index->avatar)." width='70px' height='70px' />";
            }else {
                $ava     = new Avatar;
                return "<img src=".$ava->create($index->name)->toBase64() ." width='70px' height='70px' />";
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
            $tag    = "<a href=". route('alumni.show', $index->id) ." class='btn btn-xs btn-info' ><i class='fa fa-search'></i> Detail</a> ";
            return $tag;
        })
        ->rawColumns([
            'id', 'avatar', 'gender', 'action'
        ])
        ->make(true);
    }

    public function show($id)
    {
        $data      = Student::findOrFail($id);
        $histories = ClassHistory::where('student_id',$id)->orderBy('created_at', 'desc')->first();
        $history   = ClassHistory::where('student_id',$id)->get();
        $classroom = Classroom::all();
        $years     = SchoolYear::all();
        return view($this->folder.'.show', compact('data', 'history', 'histories', 'classroom', 'years'));
    }
}
