<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	protected $fillable = [
        'name',
    ];
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
	public function teacherHistories()
    {
        return $this->hasMany(TeachersHistory::class);
    }

    public function chapter()
    {
        return $this->hasMany(Chapter::class);
    }
}
