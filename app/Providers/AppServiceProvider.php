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

        Gate::define('admin', function ($user) {
            return $user->role === 42;
        });

        Gate::define('edit-branch', function ($user, $branch) {
            return $user->role === 42 || $user->branch_id === $branch->id;
        });


    }
}
