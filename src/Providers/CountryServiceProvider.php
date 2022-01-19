<?php

namespace Dealskoo\Country\Providers;

use Dealskoo\Admin\Facades\AdminMenu;
use Dealskoo\Admin\Facades\PermissionManager;
use Dealskoo\Admin\Permission;
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
        ], 'public');
        $this->publishes([
            __DIR__ . '/../../resources/lang' => resource_path('lang/vendor/country')
        ], 'lang');

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
