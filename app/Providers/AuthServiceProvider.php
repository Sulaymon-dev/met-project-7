<?php

namespace App\Providers;

use App\Book;
use App\Plan;
use App\Policies\BookPolicy;
use App\Policies\PlanPolicy;
use App\Policies\ThemePolicy;
use App\Theme;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Book::class => BookPolicy::class,
        Plan::class => PlanPolicy::class,
        Theme::class => ThemePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();
        //
    }
}
