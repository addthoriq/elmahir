<?php

namespace App\Policies;

use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeacherPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->role->hasPermissions('index-teacher');
    }

    public function create(User $user)
    {
        return $user->role->hasPermissions('create-teacher');
    }
    public function update(User $user)
    {
        return $user->role->hasPermissions('update-teacher');
    }

    public function delete(User $user)
    {
        //
    }

    public function restore(User $user)
    {
        //
    }

    public function forceDelete(User $user)
    {
        //
    }
}
