<?php

namespace Dealskoo\Country\Providers;

use Illuminate\Support\ServiceProvider;

class CountryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/admin.php');

        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'country');

        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'country');

        $this->publishes([
            __DIR__ . '/../../public' => public_path('vendor/country')
        ]);
        $this->publishes([
            __DIR__ . '/../../resources/lang' => resource_path('lang/vendor/country')
        ], 'lang');
    }
}
