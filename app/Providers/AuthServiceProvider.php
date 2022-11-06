<?php

namespace App\Providers;

use App\Models\Car;
use App\Policies\CarPolicy;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;



class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Car::class=>CarPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

         Gate::define('edit', function(User $user){
            return ($user->role == 'admin' || $user->role == 'superadmin');
         });
//        Gate::define('delete', function(User $user){
//            return ($user->role == 'superadmin');
//        });
//        Gate::define('car.owner', function (User $user, Car $car){
//            return ($user->id==$car->user_id);
//        });
//        Gate::define('create', function(User $user){
//            return ($user->role == 'superadmin');
//        });

    }
}
