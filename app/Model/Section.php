<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    // use SoftDeletes;
    
    protected $fillable = [
        'chapter_id', 'title', 'description'
    ];

    // protected $dates = ['deleted_at'];

    public function fileSection()
    {
        return $this->hasMany(fileSection::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
