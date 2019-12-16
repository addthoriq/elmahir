<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Section;
use App\Model\FileSection;
use App\Model\Chapter;
use Yajra\Datatables\Datatables;
use Form;
use Illuminate\Support\Facades\Storage;

class SectionController extends Controller
{
    protected $folder     = 'pages.sections';
    protected $rdr        = '/section';

    public function index()
    {
        $ajax     = route('section.dbtb');
        return view('pages.sections.index', compact('ajax'));
    }

    public function add($id)
    {
        $chapter = Chapter::find($id);
        return view('pages.sections.create', compact('chapter'));
    }

    public function create()
    {
        return view('pages.sections.create');
    }

    public function store(Request $request)
    {
        $filename       = $_FILES['file'];

        $count          = count($request->file('file'));
        $data = new Section;
        $data->chapter_id    = $request->chapter_id;
        $data->title         = $request->title;
        $data->description   = $request->description;
        $data->save();

        $section    = Section::orderBy('id', 'DESC')->first();

        for ($i=0; $i<$count ; $i++) { 
            $file               = new FileSection;

            $fileStore = $request->file;
            if ($fileStore) {
                $file_path = $fileStore[$i]->store('file_section', 'public');
            }

            $file->section_id   = $section->id;
            $file->title        = $filename['name'][$i];
            $file->name_file    = $file_path;
            $file->type_file    = $filename['type'][$i];
            $file->save();
        }

        $chapter    = Chapter::find($request->chapter_id);

        return redirect()->route('chapter.show', [$chapter])->with('notif', 'Data Materi berhasil ditambahkan');
    }

    public function show($id)
    {
        //untuk menemukan data
        $files          = FileSection::find($id);
        $section        = Section::find($files->section_id);
        $chapter        = Chapter::find($section->chapter_id);

        //untuk menampilkan data
        $sections       = Section::where('chapter_id', $chapter->id)->get();
        $fileSections   = fileSection::all();
    
        return view('pages.chapters.show', compact('chapter', 'sections', 'fileSections', 'files', 'section'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        Section::findOrFail($id)->update([
            'title'         => $request->title,
            'description'   => $request->description,
        ]);
        return redirect()->route('section.show', [$request->fileId])->with('notif', 'Data Materi berhasil diubah');
    }

    public function updateFile(Request $request, $id)
    {
        
    }

    public function deleteFile($id)
    {
        $file       = FileSection::find($id);
        $section    = Section::find($file->section_id);
        $chapter    = Chapter::find($section->chapter_id);

        $data       = FileSection::findOrFail($id);
        $data->delete();

        $fileCheck  = FileSection::where('section_id', $section->id)->first();

        if (!empty($fileCheck)) {
            $post   = $fileCheck->id;
            return redirect()->route('section.show', [$post])->with('notif', 'Data File berhasil dihapus');
        } else {
            $post   = $chapter->id;
            return redirect()->route('chapter.show', [$post])->with('notif', 'Data File berhasil dihapus');
        }
    }

    public function destroy($id)
    {
        $data       = Section::findOrFail($id);
        $chapter    = Chapter::find($data->chapter_id);
        $data->delete();
        return redirect()->route('chapter.show', [$chapter->id])->with('notif', 'Data Materi berhasil dihapus');
    }
}
