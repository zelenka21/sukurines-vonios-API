<?php

namespace App\Providers;

use App\Apartment;
use App\Policies\ApartmentPolicy;
use App\Review;
use App\Policies\ReviewPolicy;
use App\Reservation;
use App\Policies\ReservationPolicy;
use App\User;
use App\Policies\UserPolicy;

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

        Apartment::class => ApartmentPolicy::class,

        Review::class => ReviewPolicy::class,

        Reservation::class => ReservationPolicy::class,

        User::class => UserPolicy::class,

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

        //
    }
}
