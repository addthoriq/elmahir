<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [
        'teacher_name', 'name', 'max_student'
    ];
    public function classHistories()
    {
        return $this->hasMany(ClassHistory::class, 'class_id');
    }
}
