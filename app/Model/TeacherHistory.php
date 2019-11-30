<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TeacherHistory extends Model
{
    protected $fillable     = [
        'teacher_id', 'classroom_id', 'school_year_id', 'course_id', 'status'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
    public function school_year()
    {
        return $this->belongsTo(SchoolYear::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
