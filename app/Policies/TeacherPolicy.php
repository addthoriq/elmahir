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

    public function viewNonTeacher(User $user)
    {
        return $user->role->hasPermissions('index-nonteacher');
    }

    public function createNonTeacher(User $user)
    {
        return $user->role->hasPermissions('create-nonteacher');
    }
    public function updateNonTeacher(User $user)
    {
        return $user->role->hasPermissions('update-nonteacher');
    }
}
