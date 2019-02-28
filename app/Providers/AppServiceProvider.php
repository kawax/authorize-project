<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Revolution\Authorize\Facades\Authorize;

use App\Authorize\CustomDriver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Authorize::extend('custom', function ($app) {
            return new CustomDriver;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
