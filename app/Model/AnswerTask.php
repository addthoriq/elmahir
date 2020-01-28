<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AnswerTask extends Model
{	
    protected $fillable = [
        'task_id', 'student_id', 'title', 'answer'
    ];
    
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function assesmentTask()
    {
        return $this->hasMany(AssesmentTask::class);
    }

    public function task()
    {
    	return $this->belongsTo(Task::class);
    }
}
