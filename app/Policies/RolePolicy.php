<?php

namespace App\Policies;

use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->role->hasPermissions('index-role');
    }

    public function create(User $user)
    {
        return $user->role->hasPermissions('create-role');
    }
    public function update(User $user)
    {
        return $user->role->hasPermissions('update-role');
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

    public function viewPerm(User $user)
    {
        return $user->role->hasPermissions('index-permission');
    }

    public function createPerm(User $user)
    {
        return $user->role->hasPermissions('create-permission');
    }
    public function updatePerm(User $user)
    {
        return $user->role->hasPermissions('update-permission');
    }

    public function deletePerm(User $user)
    {
        //
    }

    public function restorePerm(User $user)
    {
        //
    }
}
