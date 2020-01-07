<?php

namespace App\Policies;

use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    //Course
    public function view(User $user)
    {
        return $user->role->hasPermissions('index-course');
    }
    public function create(User $user)
    {
        return $user->role->hasPermissions('create-course');
    }
    public function update(User $user)
    {
        return $user->role->hasPermissions('update-course');
    }

    //NonCourse
    public function viewNonCourse(User $user)
    {
        return $user->role->hasPermissions('index-noncourse');
    }
    public function createNonCourse(User $user)
    {
        return $user->role->hasPermissions('create-noncourse');
    }
    public function restore(User $user)
    {
        return $user->role->hasPermissions('update-noncourse');
    }
    public function forceDelete(User $user)
    {
        //
    }

    //List Course
    public function viewListCourse(User $user)
    {
        return $user->role->hasPermissions('index-listcourse');
    }
    public function createListCourse(User $user)
    {
        return $user->role->hasPermissions('create-listcourse');
    }
    public function updateListCourse(User $user)
    {
        return $user->role->hasPermissions('update-listcourse');
    }
    public function deleteListCourse(User $user)
    {
        return $user->role->hasPermissions('delete-listcourse');
    }
}
