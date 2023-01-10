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
        $LOCALSTUDENTCODE = 1;
        $INTERNATIONALSTUDENTCODE = 2;
        $this->registerPolicies();

        /**
         * 
         */
        Gate::define('Admin', function($user){
            return $user->role_id != $LOCALSTUDENTCODE || $user->role_id != $INTERNATIONALSTUDENTCODE;
        });
        Gate::define('Student', function($user){
            return $user->role_id == $LOCALSTUDENTCODE || $user->role_id == $INTERNATIONALSTUDENTCODE;
        });
    }
}
