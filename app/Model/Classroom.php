<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [
        'teacher_id', 'name', 'max_student'
    ];
    public function classHistories()
    {
        return $this->hasMany(ClassHistory::class);
    }
    public function student()
    {
        return $this->hasOne(Student::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function course()
    {
        return $this->hasMany(Course::class);
    }
}
