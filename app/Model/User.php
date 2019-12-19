<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function profileUser()
    {
        return $this->hasOne(ProfileUser::class);
    }
    public function classroom()
    {
        return $this->hasMany(Classroom::class);
    }
    public function course()
    {
        return $this->hasMany(Course::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
