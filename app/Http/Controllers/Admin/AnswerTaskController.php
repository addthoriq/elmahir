<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Classroom;
use App\Model\Course;
use App\Model\Task;
use App\Model\FileTask;
use App\Model\AnswerTask;
use App\Model\FileAnswerTask;
use App\Model\AssessmentTask;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;
use Form;

class AnswerTaskController extends Controller
{
    public function index()
    {
        //
    }

    public function home($id)
    {
        $answerTask = AnswerTask::where('task_id', $id)->get();
        $ajax = route('answertask.dbtb', $id);
        return view('admin.taskAnswers.index', compact('answerTask', 'ajax'));
    }
    public function dbTables(Request $request, $id)
    {
        $data     = AnswerTask::where('task_id', $id)->get();
        return Datatables::of($data)
        ->editColumn('student_id', function ($index) {
            return isset($index->student->name) ? $index->student->name : '-';
        })
        ->addColumn('classroom', function($index) {
            return isset($index->student->classroom->name) ? $index->student->classroom->name : '-';
        })
        ->addColumn('score', function($index) {
            $value = AssessmentTask::where('answer_task_id', $index->id)->get()->first();
            return isset($value->score) ? $value->score : '<i>belum dinilai</i>';
        })
        ->addColumn('action', function($index){
            $value = AssessmentTask::where('answer_task_id', $index->id)->get()->first();
            if ($value->score) {
                $score = "<a href=". route('answertask.show', $index->id) ." class='btn btn-xs text-white btn-primary'><i class='fa fa-check'></i> Ubah Nilai</a>";
            } else {
                $score = "<a href=". route('answertask.show', $index->id) ." class='btn btn-xs text-white btn-success'><i class='fa fa-pencil'></i> Koreksi</a>";
            }
            $tag     = Form::open(["url"=>route("answertask.destroy", $index->id), "method" => "DELETE"]);
            $tag    .= "<div class='btn-group'>";
            $tag    .= $score;
            $tag    .= "<button type='submit' class='btn btn-xs btn-danger'><i class='fa fa-trash'></i> Hapus</button>";
            $tag    .= "</div>";
            $tag    .= Form::close();
            return $tag;
        })
        ->rawColumns([
            'id', 'score', 'action'
        ])
        ->make(true);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $answer = AnswerTask::find($id);
        $task = Task::withTrashed()->find($answer->task_id);
        $files = FileAnswerTask::where('answer_task_id', $id)->get();
        $assesment = AssessmentTask::where('answer_task_id', $id)->get()->first();
        return view('admin.taskAnswers.show', compact('answer', 'files', 'task', 'assesment'));
    }

    public function storeScore(Request $request, $id)
    {
        AssessmentTask::where('answer_task_id', $id)->first()->update([
            'score'             => $request->score,
            // 'updated_by'       => $request->updated_by,
        ]);

        return redirect()->route('answertask.show', $request->id)->with('notif', 'Nilai berhasil diinputkan');
    }

    public function updateScore(Request $request, $id)
    {
        AssessmentTask::where('answer_task_id', $id)->first()->update([
            'score'             => $request->score,
            // 'updated_by'       => $request->updated_by,
        ]);
        return redirect()->route('answertask.show', $request->id)->with('notif', 'Nilai berhasil diubah');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $task = AnswerTask::findOrFail($id);
        dd($task);
        $task->delete();
        return redirect()->route('answertask.index')->with('notif', 'Data berhasil ditutup');
    }

}
