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

        //gate protecting private profile
        Gate::define('viewPrivateProfile', function($user, $profile){
            return $user->id == $profile->user_id;
        });

        Gate::define('writingRight', function($user){
            return in_array($user->role, [2, 4, 5]);
        });





    }
}
