<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Section;
use App\Model\Course;
use App\Model\FileSection;
use App\Model\Chapter;
use Yajra\Datatables\Datatables;
use Form;
use Illuminate\Support\Facades\Storage;

class SectionController extends Controller
{
    public function home($id)
    {
        $section = Section::find($id);
        $fileSections = FileSection::where('section_id', $id)->get();
        return view('pages.sections.index', compact('section', 'fileSections'));
    }

    public function index()
    {

    }

    public function add($id)
    {
        $course = Course::find($id);
        return view('pages.sections.create', compact('course'));
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
        $data->course_id     = $request->course_id;
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

        return redirect()->route('sectioncourse.sectionlist', [$request->course_id])->with('notif', 'Data Materi berhasil ditambahkan');
    }

    public function show($id)
    {
        //untuk menemukan data
        $files          = FileSection::find($id);
        $section        = Section::find($files->section_id);
        $course         = Course::find($section->course_id);
        $fileSections   = fileSection::where('section_id', $section->id)->get();
        // dd($fileSections);
    
        return view('pages.sections.index', compact('course', 'fileSections', 'files', 'section'));
    }

    public function fileDownload($id)
    {
        $file = FileSection::findOrFail($id);
        $link = $file->name_file;
        $catch = public_path()."/".$link;
        return response()->download(storage_path("app/public/{$link}"));
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
        // dd($request->description);
        if ($request->sectionId) {
            return redirect()->route('section.home', $request->sectionId)->with('notif', 'Data Materi berhasil diubah');
        } else {
            return redirect()->route('section.show', $request->fileId)->with('notif', 'Data Materi berhasil diubah');
        }
    }

    public function addFile(Request $request, $id)
    {
        $filename       = $_FILES['file'];
        $count          = count($request->file('file'));

        for ($i=0; $i < $count; $i++) { 
            $data               = new FileSection;

            $fileStore = $request->file;
            if ($fileStore) {
                $file_path = $fileStore[$i]->store('file_section', 'public');
            }

            $data->section_id   = $id;
            $data->title        = $filename['name'][$i];
            $data->name_file    = $file_path;
            $data->type_file    = $filename['type'][$i];
            $data->save();
        }

        return redirect()->route('section.home', $id)->with('notif', 'Data File Materi berhasil ditambah');
    }

    public function deleteFile($id)
    {
        $file       = FileSection::find($id);
        $section    = Section::find($file->section_id);

        //Deleting File
        $data       = FileSection::findOrFail($id);
        $data->delete();

        $fileCheck  = FileSection::where('section_id', $section->id)->first();

        if (!empty($fileCheck)) {
            $post   = $fileCheck->id;
            return redirect()->route('section.show', [$post])->with('notif', 'Data File berhasil dihapus');
        } else {
            $post   = $section->id;
            return redirect()->route('section.home', [$post])->with('notif', 'Data File berhasil dihapus');
        }
    }

    public function destroy($id)
    {
        $data       = Section::findOrFail($id);
        $data->delete();
        return redirect()->route('sectioncourse.sectionlist', $data->course_id)->with('notif', 'Data Materi berhasil dihapus');
    }
}