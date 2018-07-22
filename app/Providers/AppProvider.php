<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class AppProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('Language', function ($app) {
            return new \App\Libs\Providers\Language();
        });

        $this->app->singleton('Category', function ($app) {
            return new \App\Libs\Providers\Category();
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        return ['Category'];
    }
}
