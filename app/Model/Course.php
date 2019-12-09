<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	protected $fillable = [
        'name',
    ];
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function classroomCourse()
    {
        return $this->hasMany(ClassroomCourse::class);
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
