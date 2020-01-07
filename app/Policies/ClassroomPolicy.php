<?php

namespace App\Policies;

use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeacherPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->role->hasPermissions('index-classroom');
    }

    public function create(User $user)
    {
        return $user->role->hasPermissions('create-classroom');
    }
    public function update(User $user)
    {
        return $user->role->hasPermissions('update-classroom');
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

    public function viewYear(User $user)
    {
        return $user->role->hasPermissions('index-schoolyear');
    }

    public function createYear(User $user)
    {
        return $user->role->hasPermissions('create-schoolyear');
    }
    public function updateYear(User $user)
    {
        return $user->role->hasPermissions('update-schoolyear');
    }
}
