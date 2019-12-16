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

    public function chapter()
    {
        return $this->hasMany(Chapter::class);
    }
}
