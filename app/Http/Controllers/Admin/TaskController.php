<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Task;
use App\Model\FileTask;
use App\Model\Classroom;
use App\Model\ClassHistory;
use App\Model\ListCourse;
use App\Model\AnswerTask;
use App\Model\FileAnswerTask;
use App\Model\Course;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;
use Form;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    protected $folder     = 'admin.tasks';
    protected $rdr        = '/task';

    public function index()
    {
        if (Gate::allows('index-task')) {
            $listCourse = ListCourse::all();
            $classroom = Classroom::all();
            $ajax     = route('task.dbtb');
            return view('admin.tasks.listTask', compact('ajax', 'listCourse', 'classroom'));
        }else {
            abort(403);
        }
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
            $view   .= "<b>Pembuat</b> : ".$index->created_by .", ".$index->created_at->format('d M Y H:i');
            $view   .= "</small>";
            return $view;
        })
        ->addColumn('course', function ($index) {
            return $index->course->list_course;
        })
        ->addColumn('classroom', function($index){
            return $index->course->classroom;
        })
        ->addColumn('file', function($index) {
            $isi    = FileTask::where('task_id', $index->id)->get();
            $count  = count($isi);
            if ($count < 1) {
                return "<span class='badge badge-warning'>Kosong</span>";
            } else {
                return "<span class='badge badge-primary'>".$count." File</span>";
            }
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
            $tag    .= "<a href=". route('task.show', $index->id) ." class='btn btn-xs btn-primary'><i class='fa fa-eye'></i></a> ";
            $tag    .= $button;
            $tag    .= "</div>";
            $tag    .= Form::close();
            return $tag;
        })
        ->rawColumns([
            'id', 'title', 'periode', 'file', 'action'
        ])
        ->make(true);
    }

    public function create()
    {
        if (Gate::allows('create-task')) {
            $course = Course::all();
            $listCourse = ListCourse::all();
            $classroom = Classroom::all();
            return view('admin.tasks.create', compact('course', 'listCourse', 'classroom'));
        }else {
            abort(403);
        }
    }

    public function store(Request $request)
    {
        if (Gate::allows('create-task')) {
            $filename       = $_FILES['file'];
            $count          = count($request->file('file'));

            $data = new Task;
            $data->course_id        = $request->course_id;
            $data->title            = $request->title;
            $data->description      = $request->description;
            $data->start_periode    = $request->start_periode;
            $data->end_periode      = $request->end_periode;
            $data->created_by       = 'Bambang';
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

            }
            return redirect()->route('task.index')->with('notif', 'Data Materi berhasil ditambahkan');
        }else {
            abort(403);
        }
    }

    public function detail($id)
    {
        if (Gate::allows('update-task')) {
            $files = FileTask::find($id);
            $task = Task::withTrashed()->find($files->task_id);
            $course = Course::find($task->course_id);
            $fileTasks = fileTask::where('task_id', $task->id)->get();
            $class = Classroom::where('name', $task->course->classroom)->firstOrFail();
            $classHistory = ClassHistory::where('classroom_id', $class->id)->get();
            $answerTask = AnswerTask::where('task_id', $id)->get();
            return view('admin.tasks.fileView', compact('course', 'fileTasks', 'files', 'task', 'classHistory', 'class', 'answerTask'));
        }else {
            abort(403);
        }
    }

    public function show($id)
    {
        if (Gate::allows('update-task')) {
            $task = Task::withTrashed()->find($id);
            $fileTask = fileTask::where('task_id', $id)->get();
            $class = Classroom::where('name', $task->course->classroom)->firstOrFail();
            $classHistory = ClassHistory::where('classroom_id', $class->id)->get();
            $answerTask = AnswerTask::where('task_id', $id)->get();
            return view('admin.tasks.index', compact('task', 'fileTask', 'class', 'classHistory', 'answerTask'));
        }else {
            abort(403);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        if (Gate::allows('update-task')) {
            Task::withTrashed()->findOrFail($id)->update([
                'title'             => $request->title,
                'description'       => $request->description,
                'start_periode'     => $request->start_periode,
                'end_periode'       => $request->end_periode,
                'updated_by'        => 'Badung',
            ]);
            return redirect()->route('task.show', $id)->with('notif', 'Data Tugas berhasil diubah');
        }else {
            abort(403);
        }
    }


    public function destroy($id)
    {
        $task = Task::withTrashed()->findOrFail($id);
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
        if (Gate::allows('create-task')) {
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

            if ($request->TaskId) {
                return redirect()->route('task.show', $id)->with('notif', 'Data File Tugas berhasil ditambah');
            } else {
                return redirect()->route('task.detail', $request->fileId)->with('notif', 'Data File Tugas berhasil ditambah');
            }
        }else {
            abort(403);
        }
    }

    public function deleteFileHome($id)
    {
        $file       = FileTask::find($id);
        $task    = Task::withTrashed()->find($file->task_id);

        //Deleting File
        $data       = FileTask::findOrFail($id);
        $data->delete();

        $fileCheck  = FileTask::where('task_id', $task->id)->first();

        return redirect()->route('task.show', [$task->id])->with('notif', 'Data File berhasil dihapus');
    }

    public function deleteFile($id)
    {
        $file       = FileTask::find($id);
        $task    = Task::withTrashed()->find($file->task_id);

        //Deleting File
        $data       = FileTask::findOrFail($id);
        $data->delete();

        $fileCheck  = FileTask::where('task_id', $task->id)->first();

        if (!empty($fileCheck)) {
            $post   = $fileCheck->id;
            return redirect()->route('task.detail', [$post])->with('notif', 'Data File berhasil dihapus');
        } else {
            $post   = $task->id;
            return redirect()->route('task.show', [$post])->with('notif', 'Data File berhasil dihapus');
        }
    }

}
