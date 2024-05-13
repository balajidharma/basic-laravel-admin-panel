<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Role' => 'BalajiDharma\LaravelAdminCore\Policies\RolePolicy',
        'App\Models\Permission' => 'BalajiDharma\LaravelAdminCore\Policies\PermissionPolicy',
        'App\Models\User' => 'BalajiDharma\LaravelAdminCore\Policies\UserPolicy',
        'BalajiDharma\LaravelCategory\Models\Category' => 'BalajiDharma\LaravelCategory\Policies\CategoryPolicy',
        'BalajiDharma\LaravelCategory\Models\CategoryType' => 'BalajiDharma\LaravelCategory\Policies\CategoryTypePolicy',
        'BalajiDharma\LaravelMenu\Models\Menu' => 'BalajiDharma\LaravelMenu\Policies\MenuPolicy',
        'BalajiDharma\LaravelMenu\Models\MenuItem' => 'BalajiDharma\LaravelMenu\Policies\MenuItemPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Implicitly grant "Super-Admin" role all permission checks using can()
        Gate::before(function ($user, $ability) {
            if ($user->hasRole(config('admin.roles.super_admin'))) {
                return true;
            }
        });
    }
}
