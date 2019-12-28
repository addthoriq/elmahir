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
    public function courseList()
    {
        $ajax     = route('sectioncourse.dbcourse');
        return view('admin.sections.listCourse', compact('ajax'));
    }

    public function sectionList($id)
    {
        $course = Course::find($id);
        $ajax     = route('sectioncourse.dbsection', $id);
        return view('admin.sections.listSection', compact('ajax', 'course'));
    }

    public function dbCourse(Request $request)
    {
        $data     = Course::all();
        return Datatables::of($data)
        ->editColumn('user_id', function ($index) {
            return isset($index->user->name) ? $index->user->name : '-';
        })
        ->addColumn('section', function($index) {
            $isi    = Section::where('course_id', $index->id)->get();
            $count  = count($isi);
            if ($count < 1) {
                return "<span class='label label-warning'>Kosong</span>";
            } else {
                return "<span class='label label-primary'>".$count." Materi</span>";
            }
        })
        ->addColumn('action', function($index){
            $tag = "<a href='".route('sectioncourse.sectionlist', $index->id)."' class='btn btn-xs btn-default'><i class='fa fa-folder'></i> Lihat Materi</a>";
            return $tag;
        })
        ->rawColumns([
            'id', 'section', 'action'
        ])
        ->make(true);
    }

    public function dbSection(Request $request, $id)
    {
        $data     = Section::where('course_id', $id)->get();
        return Datatables::of($data)
        ->editColumn('created_at', function ($index) {
            return $index->created_at->format('d M Y').$index->created_at->format(' H:i')." WIB";
        })
        ->addColumn('file', function($index) {
            $isi    = FileSection::where('section_id', $index->id)->get();
            $count  = count($isi);
            if ($count < 1) {
                return "<span class='label label-warning'>Kosong</span>";
            } else {
                return "<span class='label label-primary'>".$count." File</span>";
            }
        })
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
            'id', 'file', 'action'
        ])
        ->make(true);
    }
}
