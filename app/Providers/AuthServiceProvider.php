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

        //Manage Student
        Gate::define('index-student', 'App\Policies\StudentPolicy@view');
        Gate::define('create-student', 'App\Policies\StudentPolicy@create');
        Gate::define('update-student', 'App\Policies\StudentPolicy@update');

        //Manage Teacher
        Gate::define('index-teacher', 'App\Policies\TeacherPolicy@view');
        Gate::define('create-teacher', 'App\Policies\TeacherPolicy@create');
        Gate::define('update-teacher', 'App\Policies\TeacherPolicy@update');
    }
}
