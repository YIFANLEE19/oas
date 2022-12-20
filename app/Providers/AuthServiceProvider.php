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

        /**
         * 
         */
        Gate::define('LocalStudent', function($user){
            return $user->role_id == '1' || $user->role_id == '3';
        });
        Gate::define('InternationalStudent', function($user){
            return $user->role_id == '2' || $user->role_id == '3';
        });
        Gate::define('Superadmin', function($user){
            return $user->role_id == '3';
        });
        Gate::define('AARO', function($user){
            return $user->role_id == '4' || $user->role_id == '3';
        });
        Gate::define('AFO', function($user){
            return $user->role_id == '5' || $user->role_id == '3';
        });
        Gate::define('ISO', function($user){
            return $user->role_id == '6' || $user->role_id == '3';
        });
        Gate::define('SRO', function($user){
            return $user->role_id == '7' || $user->role_id == '3';
        });

    }
}
