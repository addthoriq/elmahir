<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ClassHistory extends Model
{
    protected $fillable     = [
        'school_year_id', 'classroom_id', 'student_id', 'status'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
    public function school_year()
    {
        return $this->belongsTo(SchoolYear::class);
    }

}
