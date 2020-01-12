<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded     = [];

    public function profileStudent()
    {
        return $this->hasOne(ProfileStudent::class);
    }
    public function classHistories()
    {
        return $this->hasMany(ClassHistory::class, 'classroom_id');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
    public function answerTask()
    {
        return $this->hasMany(answerTask::class);
    }
}
