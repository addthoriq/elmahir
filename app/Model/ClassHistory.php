<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ClassHistory extends Model
{
    protected $fillable     = [
        'school_year_id', 'class_id', 'student_id', 'status'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }
    public function school_year()
    {
        return $this->belongsTo(SchoolYear::class);
    }

}
