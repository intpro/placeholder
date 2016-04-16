<?php

namespace Interpro\Placeholder;

use Illuminate\Support\ServiceProvider;

class PlaceholderServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //Publishes package config file to applications config folder
        $this->publishes([__DIR__.'/Laravel/config/placeholder.php' => config_path('placeholder.php')]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            'Interpro\Placeholder\Concept\PlaceholderAgent',
            'Interpro\Placeholder\Laravel\PlaceholderAgent'
        );
    }

}

