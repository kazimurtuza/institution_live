<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        
        $this->registerPolicies();

        /* define a shop admin role */
         Gate::define('isAdmin', function($user) {
            return $user->usertype == 1;
        });
      
        /* define a customer role */
        Gate::define('isCustomer', function($user) {
            return $user->usertype == 0;
        });      
    }
}
