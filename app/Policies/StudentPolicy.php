<?php

namespace App\Policies;

use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->role->hasPermissions('index-student');
    }

    public function create(User $user)
    {
        return $user->role->hasPermissions('create-student');
    }
    public function update(User $user)
    {
        return $user->role->hasPermissions('update-student');
    }
    public function viewAlumni(User $user)
    {
        return $user->role->hasPermissions('index-alumni');
    }
    public function createAlumni(User $user)
    {
        return $user->role->hasPermissions('create-alumni');
    }
    public function updateAlumni(User $user)
    {
        return $user->role->hasPermissions('update-alumni');
    }
    public function deleteAlumni(User $user)
    {
        //
    }
    public function restoreAlumni(User $user)
    {
        //
    }
    public function forceDeleteAlumni(User $user)
    {
        //
    }
}
