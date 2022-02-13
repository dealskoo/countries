<?php

namespace Dealskoo\Country\Providers;

use Dealskoo\Admin\Facades\AdminMenu;
use Dealskoo\Admin\Facades\PermissionManager;
use Dealskoo\Admin\Permission;
use Dealskoo\Country\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class CountryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/country.php', 'country');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Request::macro('country', function () {
            $default_alpha2 = Str::upper(config('country.default_alpha2'));
            $alpha2 = Str::upper(\request(config('country.prefix'), $default_alpha2));
            $country = Country::query()->where('alpha2', $alpha2)->first();
            if (!$country) {
                $country = Country::query()->where('alpha2', $default_alpha2)->first();
            }
            return $country;
        });

        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

            $this->publishes([
                __DIR__ . '/../../config/country.php' => config_path('country.php')
            ], 'config');

            $this->publishes([
                __DIR__ . '/../../public' => public_path('vendor/country')
            ], 'public');

            $this->publishes([
                __DIR__ . '/../../resources/lang' => resource_path('lang/vendor/country')
            ], 'lang');
        }

        $this->loadRoutesFrom(__DIR__ . '/../../routes/admin.php');

        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'country');

        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'country');

        AdminMenu::whereTitle('admin::admin.settings', function ($menu) {
            $menu->route('admin.countries.index', 'country::country.countries', [], ['permission' => 'countries.index']);
        });

        PermissionManager::add(new Permission('countries.index', 'Countries List'), 'admin.settings');
        PermissionManager::add(new Permission('countries.show', 'View Country'), 'countries.index');
        PermissionManager::add(new Permission('countries.create', 'Create Country'), 'countries.index');
        PermissionManager::add(new Permission('countries.edit', 'Edit Country'), 'countries.index');
        PermissionManager::add(new Permission('countries.destroy', 'Destroy Country'), 'countries.index');
    }
}
