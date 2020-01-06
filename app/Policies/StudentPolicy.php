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
