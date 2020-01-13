<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [
        'user_id', 'name', 'max_student'
    ];
    public function classHistories()
    {
        return $this->hasMany(ClassHistory::class, 'classroom_id');
    }
    public function student()
    {
        return $this->hasOne(Student::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function course()
    {
        return $this->hasMany(Course::class);
    }
}
