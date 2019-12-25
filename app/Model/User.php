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
    public function task()
    {
        return $this->hasMany(Task::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function hasRole($roles)
    {
        $this->have_role     = $this->getUserRole();
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->cekUserRole($role)) {
                    return true;
                }
            }
        }else {
            return $this->cekUserRole($roles);
        }
        return false;
    }
    protected function getUserRole(){
        return $this->role()->getResults();
    }
    private function cekUserRole($role){
        return (strtolower($role) == strtolower($this->have_role->name)?true:false);
    }
}
