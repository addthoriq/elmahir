<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $guarded     = [];
    
    public function profileTeacher()
    {
        return $this->hasOne(ProfileTeacher::class);
    }
    public function classroom()
    {
        return $this->hasMany(Classroom::class);
    }
    public function course()
    {
        return $this->hasMany(Course::class);
    }
}
