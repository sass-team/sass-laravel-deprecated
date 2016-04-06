<?php

namespace App\Providers;

use App\Sass\Repositories\LandingPage\DbLandingPageRepository;
use App\Sass\Repositories\LandingPage\LandingPageRepository;
use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->bind(UserRepository::class, DbUserRepository::class);
        $this->app->bind(LandingPageRepository::class, DbLandingPageRepository::class);
    }
}
