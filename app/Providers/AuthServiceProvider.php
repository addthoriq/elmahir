<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //User only
        Gate::define('isAdmin', function($user){
            return $user->role_id == 1;
        });
        //Manage Role
        Gate::define('index-role','App\Policies\RolePolicy@view');
        Gate::define('create-role','App\Policies\RolePolicy@create');
        Gate::define('update-role','App\Policies\RolePolicy@update');
        //ManagePermission
        Gate::define('index-permission','App\Policies\RolePolicy@viewPerm');
        Gate::define('create-permission','App\Policies\RolePolicy@createPerm');
        Gate::define('update-permission','App\Policies\RolePolicy@updatePerm');

        //Manage Student
        Gate::define('index-student', 'App\Policies\StudentPolicy@view');
        Gate::define('create-student', 'App\Policies\StudentPolicy@create');
        Gate::define('update-student', 'App\Policies\StudentPolicy@update');
        //Manage Alumni
        Gate::define('index-alumni', 'App\Policies\StudentPolicy@viewAlumni');
        Gate::define('create-alumni', 'App\Policies\StudentPolicy@createAlumni');
        Gate::define('update-alumni', 'App\Policies\StudentPolicy@updateAlumni');

        //Manage Teacher
        Gate::define('index-teacher', 'App\Policies\TeacherPolicy@view');
        Gate::define('create-teacher', 'App\Policies\TeacherPolicy@create');
        Gate::define('update-teacher', 'App\Policies\TeacherPolicy@update');

        //Manage Course
        Gate::define('index-course','App\Policies\CoursePolicy@view');
        Gate::define('create-course','App\Policies\CoursePolicy@create');
        Gate::define('update-course','App\Policies\CoursePolicy@update');
        //Manage NonCourse
        Gate::define('index-noncourse','App\Policies\CoursePolicy@viewNonCourse');
        Gate::define('create-noncourse','App\Policies\CoursePolicy@createNonCourse');
        Gate::define('update-noncourse','App\Policies\CoursePolicy@restore');
        
        //Manage List Course
        Gate::define('index-listcourse','App\Policies\CoursePolicy@viewListCourse');
        Gate::define('create-listcourse','App\Policies\CoursePolicy@createListCourse');
        Gate::define('update-listcourse','App\Policies\CoursePolicy@updateListCourse');
    }
}
