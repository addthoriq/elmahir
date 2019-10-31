<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProfileStudent extends Model
{
    protected $guarded     = [];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
