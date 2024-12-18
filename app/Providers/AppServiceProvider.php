<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        /*
        Role quick references:
        1 = employee
        2 = employer
        42 = admin
        */
//        EMPLOYEE
        Gate::define('employee', function ($user) {
            return $user->role === 1;
        });

        Gate::define('create-application', function ($user) {
            return  $user->role === 1 || $user->role === 42;
        });

        Gate::define('view-application', function ($user, $application) {
            return  $user->id === $application->user_id || $user->role === 42 || $user->role === 2 && $user->branch_id === $application->vacancy->branch_id;
        });

//        ADMIN
        Gate::define('admin', function ($user) {
            return $user->role === 42;
        });

        Gate::define('edit-branch', function ($user, $branch) {
            return $user->role === 42 || $user->branch_id === $branch->id;
        });

        Gate::define('create-vacancy', function ($user) {
           return  $user->role === 42 || isset($user->branch_id);
        });

        Gate::define('manage-vacancy', function ($user, $vacancy) {
           return  $user->role === 42 || $user->branch_id === $vacancy->branch_id;
        });

        Gate::define('not-admin', function ($user) {
            return $user->role !== 42;
        });


    }
}
