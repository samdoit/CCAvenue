<?php

namespace Samdoit\CCAvenue;
use Illuminate\Support\ServiceProvider;

class CCAvenueServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes(
            [
            __DIR__.'/config/ccavenue.php' => config_path('ccavenue.php'),
            ]
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}