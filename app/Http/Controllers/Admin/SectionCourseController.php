<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Course;
use App\Model\Section;
use App\Model\FileSection;
use Yajra\Datatables\Datatables;
use Form;

class SectionCourseController extends Controller
{

    public function sectionList()
    {
        $ajax     = route('section.dbtb');
        return view('admin.sections.listCourse', compact('ajax'));
    }

    public function dbTables(Request $Request)
    {
        $data     = Section::all();
        return Datatables::of($data)
        // ->addColumn('file', function($index) {
        //     $isi    = FileSection::where('section_id', $index->id)->get();
        //     $count  = count($isi);
        //     if ($count < 1) {
        //         return "<span class='label label-warning'>Kosong</span>";
        //     } else {
        //         return "<span class='label label-primary'>".$count." File</span>";
        //     }
        // })
        ->addColumn('action', function($index){
            $tag     = Form::open(["url"=>route("section.destroy", $index->id), "method" => "DELETE"]);
            $tag    .= "<div class='btn-group'>";
            $tag    .= "<a href='".route('section.home', $index->id)."' class='btn btn-xs btn-default'><i class='fa fa-folder'></i> Buka Materi</a>";
            $tag    .= "<button type='submit' class='btn btn-xs btn-danger'><i class='fa fa-trash'></i> Hapus</button>";
            $tag    .= "</div>";
            $tag    .= Form::close();
            return $tag;
        })
        ->rawColumns([
            'id', 'action'
        ])
        ->make(true);
    }
}
