<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProfileTeacher extends Model
{
    protected $guarded     = [];
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
