<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FileSection extends Model
{
    protected $fillable = [
        'section_id', 'title', 'name_file', 'type_file', 'link', 'created_at', 'updated_at'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
