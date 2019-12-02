<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	protected $fillable = [
        'teacher_id', 'name', 'assistant', 'classroom_id', 'semester'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
	public function teacherHistories()
    {
        return $this->hasMany(TeachersHistory::class);
    }
}
