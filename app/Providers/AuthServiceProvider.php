<?php

namespace App\Providers;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Test drive
        Gate::define('test_drive_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('test_drive_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('test_drive_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('test_drive_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('test_drive_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Berita
        Gate::define('beritum_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('beritum_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('beritum_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('beritum_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('beritum_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Merk
        Gate::define('merk_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('merk_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('merk_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('merk_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('merk_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

    }
}
