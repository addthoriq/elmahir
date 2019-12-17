<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Task;
use App\Model\FileTask;
use App\Model\Classroom;
use App\Model\ListCourse;
use App\Model\AnswerTask;
use App\Model\FileAnswerTask;
use App\Model\Course;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;
use Form;

class TaskController extends Controller
{
    protected $folder     = 'admin.tasks';
    protected $rdr        = '/task';

    public function index()
    {
        $ajax     = route('task.dbtb');
        return view('admin.tasks.index', compact('ajax'));
    }

    public function dbTables(Request $request)
    {
        $data     = Task::withTrashed()->get();
        return Datatables::of($data)
        ->editColumn('title', function ($index) {
            if (isset($index->title)) {
                $title = $index->title;
            } else {
                $title = '-';
            }

            $view   = "<b>".$title."</b><br>";
            $view   .= "<small>";
            $view   .= "<b>Pembuat</b> : Suryo Widiyanto, ".$index->created_at->format('d M Y H:i');
            $view   .= "</small>";
            return $view;
        })
        ->addColumn('course', function ($index) {
            return $index->course->list_course;
        })
        ->addColumn('classroom', function($index){
            return $index->course->classroom;
        })
        ->addColumn('action', function($index){
            if ($index->deleted_at !== NULL) {
                $button = "<button type='submit' class='btn btn-xs btn-primary'><i class='fa fa-check'></i> Terbitkan</button>";
                $stat   = "task.restore";
                $method = "PATCH";
            } else {
                $button = "<button type='submit' class='btn btn-xs btn-danger'><i class='fa fa-minus'></i> Tutup</button>";
                $stat   = "task.destroy";
                $method = "DELETE";
            }

            $tag     = Form::open(["url"=>route($stat, $index->id), "method" => $method]);
            $tag    .= "<div class='btn-group'>";
            $tag    .= "<a href=". route('task.show', $index->id) ." class='btn btn-xs btn-success' ><i class='fa fa-search'></i> Detail</a> ";
            $tag    .= $button;
            $tag    .= "</div>";
            $tag    .= Form::close();
            return $tag;
        })
        ->rawColumns([
            'id', 'title', 'periode', 'action'
        ])
        ->make(true);
    }

    public function create()
    {
        $courses   = Course::all();
        return view('admin.tasks.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $filename       = $_FILES['file'];
        $count          = count($request->file('file'));

        $data = new Task;
        $data->course_id        = $request->course_id;
        $data->title            = $request->title;
        $data->description      = $request->description;
        $data->start_periode    = $request->start_periode;
        $data->end_periode      = $request->end_periode;
        $data->created_by       = 1;
        $data->created_by       = $request->created_by;
        $data->save();

        $task    = Task::orderBy('id', 'DESC')->first();

        for ($i=0; $i<$count ; $i++) {
            $file               = new FileTask;

            $fileStore = $request->file;
            if ($fileStore) {
                $file_path = $fileStore[$i]->store('file_task', 'public');
            }

            $file->task_id      = $task->id;
            $file->title        = $filename['name'][$i];
            $file->name_file    = $file_path;
            $file->type_file    = $filename['type'][$i];
            $file->save();

            $ajax     = route('task.dbtb');

            return redirect()->route('task.index', [$ajax])->with('notif', 'Data Materi berhasil ditambahkan');
        }
    }

    public function show($id)
    {
        $task       = Task::withTrashed()->find($id);
        $fileTask   = fileTask::where('task_id', $id)->get();
        return view('admin.tasks.show', compact('task', 'fileTask'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        Task::withTrashed()->findOrFail($id)->update([
            'title'             => $request->title,
            'description'       => $request->description,
            'start_periode'     => $request->start_periode,
            'end_periode'       => $request->end_periode,
        ]);
        return redirect()->route('task.show', $id)->with('notif', 'Data Tugas berhasil diubah');
    }


    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('task.index')->with('notif', 'Data Tugas berhasil ditutup');
    }

    public function restore($id)
    {
        $task = Task::withTrashed()->where('id', $id)->restore();
        return redirect()->route('task.index')->with('notif', 'Data Tugas berhasil diterbitkan');
    }

    public function fileDownload($id)
    {
        $file = FileTask::findOrFail($id);
        $link = $file->name_file;
        $catch = public_path()."/".$link;
        return response()->download(storage_path("app/public/{$link}"));
    }

    public function addFile(Request $request, $id)
    {
        $filename       = $_FILES['file'];
        $count          = count($request->file('file'));

        for ($i=0; $i < $count; $i++) {
            $data               = new FileTask;

            $fileStore = $request->file;
            if ($fileStore) {
                $file_path = $fileStore[$i]->store('file_task', 'public');
            }

            $data->task_id   = $id;
            $data->title        = $filename['name'][$i];
            $data->name_file    = $file_path;
            $data->type_file    = $filename['type'][$i];
            $data->save();
        }

        return redirect()->route('task.show', $id)->with('notif', 'Data File Tugas berhasil ditambah');
    }

}
