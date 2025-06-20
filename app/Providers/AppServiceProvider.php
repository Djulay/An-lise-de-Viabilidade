<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // Suas políticas, se houver
    ];

    public function boot()
    {
        $this->registerPolicies();

        // Definir o Gate isSuperAdmin
        Gate::define('isSuperAdmin', function ($user) {
            return $user->role === 'super-admin';
        });
    }
}