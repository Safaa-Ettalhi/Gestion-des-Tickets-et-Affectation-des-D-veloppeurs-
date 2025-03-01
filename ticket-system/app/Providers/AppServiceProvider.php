<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Gate;
use App\Models\Ticket;
use App\Policies\TicketPolicy;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    protected $policies = [
        Ticket::class => TicketPolicy::class,
    ];

    public function boot()
    {
       // $this->registerPolicies();
       Paginator::useTailwind();

        Gate::define('admin', function ($user) {
            return $user->isAdmin();
        });

        Gate::define('developer', function ($user) {
            return $user->isDeveloper();
        });

        Gate::define('user', function ($user) {
            return $user->isUser();
        });
    }
}
