<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProfileTeacher extends Model
{
    protected $guarded     = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
