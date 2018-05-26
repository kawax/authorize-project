<?php

namespace Revolution\Authorize\GoogleApi;

use Illuminate\Support\ServiceProvider;

use Revolution\Authorize\Facades\Authorize;

class GoogleApiServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the service provider.
     *
     * @return void
     */
    public function boot()
    {
        Authorize::extend('google-api', function ($app) {
            return new GoogleApiDriver;
        });
    }
}
