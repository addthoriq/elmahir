<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Classroom;
use App\Model\ClassHistory;
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
        
    }

    public function home($id)
    {
        $task = Task::withTrashed()->find($id);
        $answerTask = AnswerTask::where('task_id', $id)->get();
        $ajax = route('answertask.dbtb', $id);
        return view('admin.taskAnswers.index', compact('answerTask', 'ajax', 'task'));
    }

    public function dbTables(Request $request, $id)
    {
        $task = Task::withTrashed()->find($id);
        $class = Classroom::where('name', $task->course->classroom)->firstOrFail();
        $data = ClassHistory::where([
            ['classroom_id', $class->id],
            ['status', 1]
        ])->get();

        return Datatables::of($data)
        ->editColumn('student_id', function ($index) {
            return isset($index->student->name) ? $index->student->name : '-';
        })
        ->addColumn('status', function($index) use($id) {
            $status = AnswerTask::where([['student_id', $index->student->id],['task_id', $id]])->first();
            return $status ? '<span class="badge badge-success text-white">Terkumpul</span>' : '<span class="badge badge-warning">Belum Dikumpul</span>';
        })
        ->addColumn('score', function($index) use($id) {
            $status = AnswerTask::where([['student_id', $index->student->id],['task_id', $id]])->first();
            if ($status) {
                $value = AssessmentTask::where('answer_task_id', $status->id)->first();
                return $value ? $value->score : '<span class="badge badge-warning">Belum Dinilai</span>';
            } else {
                return '<span class="badge badge-warning">Belum Dinilai</span>';
            }
        })
        ->addColumn('action', function($index) use($id) {
            $status = AnswerTask::where([['student_id', $index->student->id],['task_id', $id]])->first();
            if ($status) {
                $disable = "";
            } else {
                $disable = "disabled";
            }

            $tag     = Form::open(["url"=>route("answertask.destroy", $id), "method" => "DELETE"]);
            $tag    .= "<div class='btn-group'>";
            $tag    .= "<a href=". route('answertask.view', array($id, $index->student->id)) ." class='btn btn-xs text-white btn-primary ".$disable."'><i class='fa fa-eye'></i> LIhat</a>";
            $tag    .= "</div>";
            $tag    .= Form::close();
            return $tag;
        })
        ->rawColumns([
            'id', 'status', 'score', 'action'
        ])
        ->make(true);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        // $id adalah variable id dari table task
        dd($id);
        $task = Task::withTrashed()->find($id);
        $class = Classroom::where('name', $task->course->classroom)->first();
        $data = ClassHistory::where([
            ['classroom_id', $class->id],
            ['status', 1]
        ])->get();
        dd($data);
        $answer = AnswerTask::where('task_id', $task->id)->first();
        $fileAnswer = FileAnswerTask::where('answer_task_id', $answer->id)->first();
        $assesment = AssessmentTask::where('answer_task_id', $answer->id)->first();
        return view('admin.taskAnswers.show', compact('answer', 'fileAnswer', 'task', 'assesment'));
    }

    public function view($taskId = null,  $studentId = null)
    {
        $task = Task::withTrashed()->find($taskId);
        $class = Classroom::where('name', $task->course->classroom)->first();
        $classHistory = ClassHistory::where([
            ['student_id', $studentId],
            ['status', 1]
        ])->first();
        $answers = AnswerTask::where([
            ['task_id', $task->id],
            ['student_id', $studentId]
        ])->first();

        $files = FileAnswerTask::where('answer_task_id', $answers->id)->get();
        $assessment = AssessmentTask::where('answer_task_id', $answers->id)->first();

        if ($assessment = null) {
            $assessment = null;
        } else {
            $assessment = AssessmentTask::where('answer_task_id', $answers->id)->first();
        }
        
        return view('admin.taskAnswers.show', compact('answers', 'files', 'task', 'assessment', 'classHistory'));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        // give score to student
        $answers = AnswerTask::where([
            ['task_id', $request->taskId],
            ['student_id', $request->studentId]
        ])->first();
        $assessment = AssessmentTask::where('answer_task_id', $answers->id)->first();
        
        if (empty($assessment)) {
            $data = new AssessmentTask;
            $data->answer_task_id = $answers->id;
            $data->score = $request->score;
            $data->created_by = auth()->user()->id;
            $data->created_at = now();
            $data->save();
        } else {
            AssessmentTask::where('answer_task_id', $answers->id)->first()->update([
                'score' => $request->score,
            ]);
        }

        return redirect()->route('answertask.view', array($request->taskId, $request->studentId))->with('notif', 'Berhasil memberikan nilai');
    }

    public function destroy($id)
    {
        $task = AnswerTask::findOrFail($id);
        dd($task);
        $task->delete();
        return redirect()->route('answertask.index')->with('notif', 'Data berhasil ditutup');
    }

}
