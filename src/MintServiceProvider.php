<?php

namespace Yab\Mint;

use Illuminate\Support\ServiceProvider;

class MintServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/Stubs' => base_path('stubs'),
            ], 'stubs');
        }
    }
}
