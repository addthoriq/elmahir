<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable     = [
        'teacher_id', 'classroom', 'school_year_id', 'list_course', 'assistant', 'status'
    ];
    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function section()
    {
        return $this->hasMany(Section::class);
    }
    public function task()
    {
        return $this->hasMany(Task::class);
    }
}
