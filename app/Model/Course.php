<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable     = [
        'user_id', 'classroom', 'school_year_id', 'list_course', 'assistant', 'status'
    ];
    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function section()
    {
        return $this->hasMany(Section::class);
    }
    public function task()
    {
        return $this->hasMany(Task::class);
    }
}
