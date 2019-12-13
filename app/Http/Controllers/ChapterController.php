<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Chapter;
use App\Model\Course;
use App\Model\Section;
use App\Model\FileSection;
use Yajra\Datatables\Datatables;
use Form;

class ChapterController extends Controller
{
    public function index()
    {
        $ajax       = route('mapel.dbtb');
        return view('pages.chapters.index', compact('ajax'));
    }

    public function mapel(Request $request)
    {
        $data     = Course::all();
        return Datatables::of($data)
        ->editColumn('class_id', function ($index) {
            return isset($index->classroom->name) ? $index->classroom->name : '-';
        })
        ->editColumn('teacher_id', function ($index) {
            return isset($index->teacher->name) ? $index->teacher->name : '-';
        })
        ->addColumn('action', function($index){
            $tag = "<a href='".route('chapter.homeChapter', $index->id)."' class='btn btn-xs btn-default'><i class='fa fa-folder'></i> Lihat Materi</a>";
            return $tag;
        })
        ->rawColumns([
            'id', 'action'
        ])
        ->make(true);
    }

    public function homeChapter($id)
    {
        $con        = (int)$id;
        $ajax       = route('chapter.dbtb', $con);
        $chapter    = Chapter::where('course_id', $con)->get();
        $course     = Course::find($id);
        return view('pages.chapters.indexChapter', compact('ajax','chapter','course'));
    }

    public function chapter(Request $request, $id)
    {
        $data     = Chapter::where('course_id', $id)->get();
        return Datatables::of($data)
        ->editColumn('created_at', function ($index) {
                    return $index->created_at->format('d M Y');
        })
        ->addColumn('action', function($index){
            $tag     = Form::open(["url"=>route('chapter.destroy', $index->id), "method" => "DELETE"]);
            $tag    .= "<a href=".route('chapter.show', $index->id)." class='btn btn-xs btn-default' ><i class='fa fa-search'></i> Detail</a> ";
            $tag    .= "<button type='submit' class='btn btn-xs btn-danger' onclick='javascript:return confirm(`Apakah anda yakin ingin menghapus data ini? Anda akan menghapus materi materi yang berhubungan dengan Bab ini.`)' ><i class='fa fa-trash'></i> Hapus</button>";
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
    }

    public function store(Request $request)
    {
        $data = new Chapter;
        $data->course_id     = $request->course_id;
        $data->title         = $request->title;
        $data->summary       = $request->summary;
        $data->save();

        $ajax       = route('chapter.dbtb', $request->course_id);
        $chapter    = Chapter::find($request->course_id);

        return redirect()->route('chapter.homeChapter', [$chapter])->with('notif', 'Data Bab berhasil ditambahkan');
    }

    public function show($id)
    {
        $chapter        = Chapter::find($id);
        $sections       = Section::where('chapter_id', $id)->get();
        $fileSections   = fileSection::all();
        return view('pages.chapters.show', compact('chapter', 'sections', 'fileSections'));
    }

    public function file($id)
    {
        $fileSections   = fileSection::where('section_id', $id)->get();
        return $fileSections;
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        Chapter::findOrFail($id)->update([
            'title'      => $request->title,
            'summary'    => $request->summary,
        ]);
        return redirect()->route('chapter.show', [$id])->with('notif', 'Data Kelas berhasil diubah');
    }

    public function destroy($id)
    {
        $data     = Chapter::findOrFail($id);
        $chapter  = $data->course_id;
        $data->delete();
        return redirect()->route('chapter.homeChapter', [$chapter])->with('notif', 'Data Bab berhasil ditambahkan');
    }
}
