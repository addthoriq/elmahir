<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ClassroomCourse extends Model
{
    protected $fillable     = [
        'classroom_id', 'course_id', 'teacher_id', 'assistant', 'status'
    ];
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
