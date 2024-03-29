<?php

namespace App\Providers;

use App\Models\Admin;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('is_admin', function (Admin $user) {
            return $user->role == 'admin';
        });

        Gate::define('is_staff', function (Admin $user) {
            return $user->role == 'staff' || $user->role == 'admin';
        });

        Gate::define('is_marketing', function (Admin $user) {
            return $user->role == 'marketing' || $user->role == 'admin';
        });
    }
}
