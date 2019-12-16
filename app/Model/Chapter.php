<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = [
        'course_id', 'title', 'summary'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function section()
    {
        return $this->hasMany(Section::class);
    }
}
