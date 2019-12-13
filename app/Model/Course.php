<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	protected $fillable = [
        'teacher_id', 'name', 'assistant', 'class_id', 'semester'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'class_id');
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
