<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ConfigsServiceProvider extends ServiceProvider
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
        $this->mergeConfigFrom(__DIR__.'/../Configs/roles.php', 'roles');
        $this->mergeConfigFrom(__DIR__.'/../Configs/permissions.php', 'permissions');
        $this->mergeConfigFrom(__DIR__.'/../Configs/header-menu.php', 'header-menu');
        $this->mergeConfigFrom(__DIR__.'/../Configs/sidebar-menu.php', 'sidebar-menu');
        $this->mergeConfigFrom(__DIR__.'/../Configs/stock-statuses.php', 'stock-statuses');
        $this->mergeConfigFrom(__DIR__.'/../Configs/products.php', 'products');
    }
}
