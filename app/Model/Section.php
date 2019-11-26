<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'chapter_id', 'title', 'description'
    ];

    public function fileSection()
    {
        return $this->hasMany(fileSection::class);
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

}
