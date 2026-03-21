<?php

namespace Yab\Mint;

use Illuminate\Support\ServiceProvider;

class MintServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/Stubs' => base_path('stubs'),
            ], 'stubs');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
