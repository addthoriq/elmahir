<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use Notifiable;

    protected $guarded     = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profileStudent()
    {
        return $this->hasOne(ProfileStudent::class);
    }
    public function classHistories()
    {
        return $this->hasMany(ClassHistory::class);
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
    public function answerTask()
    {
        return $this->hasMany(answerTask::class);
    }
}
