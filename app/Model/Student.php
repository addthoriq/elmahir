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
        return $this->hasMany(ClassHistory::class);
    }
}
