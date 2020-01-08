<?php

namespace App\Policies;

use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SectionPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->role->hasPermissions('index-section');
    }

    public function create(User $user)
    {
        return $user->role->hasPermissions('create-section');
    }
    public function update(User $user)
    {
        return $user->role->hasPermissions('update-section');
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

    public function viewTask(User $user)
    {
        return $user->role->hasPermissions('index-task');
    }

    public function createTask(User $user)
    {
        return $user->role->hasPermissions('create-task');
    }
    public function updateTask(User $user)
    {
        return $user->role->hasPermissions('update-task');
    }
}
