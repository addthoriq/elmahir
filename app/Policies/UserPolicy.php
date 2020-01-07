<?php

namespace App\Policies;

use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->role->hasPermissions('index-user');
    }

    public function create(User $user)
    {
        return $user->role->hasPermissions('create-user');
    }
    public function update(User $user)
    {
        return $user->role->hasPermissions('update-user');
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

    public function viewNonUser(User $user)
    {
        return $user->role->hasPermissions('index-nonuser');
    }

    public function createNonUser(User $user)
    {
        return $user->role->hasPermissions('create-nonuser');
    }
    public function updateNonUser(User $user)
    {
        return $user->role->hasPermissions('update-nonuser');
    }

    public function deleteNonUser(User $user)
    {
        //
    }

    public function restoreNonUser(User $user)
    {
        //
    }
}
