<?php

namespace Bantenprov\IKKabupatenKota;

use Illuminate\Support\ServiceProvider;
use Bantenprov\IKKabupatenKota\Console\Commands\IKKabupatenKotaCommand;

/**
 * The IKKabupatenKotaServiceProvider class
 *
 * @package Bantenprov\IKKabupatenKota
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class IKKabupatenKotaServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->routeHandle();
        $this->configHandle();
        $this->langHandle();
        $this->viewHandle();
        $this->assetHandle();
        $this->migrationHandle();
        $this->publicHandle();
        $this->seedHandle();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ik-kabupaten-kota', function ($app) {
            return new IKKabupatenKota;
        });

        $this->app->singleton('command.ik-kabupaten-kota', function ($app) {
            return new IKKabupatenKotaCommand;
        });

        $this->commands('command.ik-kabupaten-kota');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'ik-kabupaten-kota',
            'command.ik-kabupaten-kota',
        ];
    }

    /**
     * Loading and publishing package's config
     *
     * @return void
     */
    protected function configHandle()
    {
        $packageConfigPath = __DIR__.'/config/config.php';
        $appConfigPath     = config_path('ik-kabupaten-kota.php');

        $this->mergeConfigFrom($packageConfigPath, 'ik-kabupaten-kota');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'ik-kabupaten-kota-config');
    }

    /**
     * Loading package routes
     *
     * @return void
     */
    protected function routeHandle()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
    }

    /**
     * Loading and publishing package's translations
     *
     * @return void
     */
    protected function langHandle()
    {
        $packageTranslationsPath = __DIR__.'/resources/lang';

        $this->loadTranslationsFrom($packageTranslationsPath, 'ik-kabupaten-kota');

        $this->publishes([
            $packageTranslationsPath => resource_path('lang/vendor/ik-kabupaten-kota'),
        ], 'ik-kabupaten-kota-lang');
    }

    /**
     * Loading and publishing package's views
     *
     * @return void
     */
    protected function viewHandle()
    {
        $packageViewsPath = __DIR__.'/resources/views';

        $this->loadViewsFrom($packageViewsPath, 'ik-kabupaten-kota');

        $this->publishes([
            $packageViewsPath => resource_path('views/vendor/ik-kabupaten-kota'),
        ], 'ik-kabupaten-kota-views');
    }

    /**
     * Publishing package's assets (JavaScript, CSS, images...)
     *
     * @return void
     */
    protected function assetHandle()
    {
        $packageAssetsPath = __DIR__.'/resources/assets';

        $this->publishes([
            $packageAssetsPath => resource_path('assets'),
        ], 'ik-kabupaten-kota-assets');
    }

    /**
     * Publishing package's migrations
     *
     * @return void
     */
    protected function migrationHandle()
    {
        $packageMigrationsPath = __DIR__.'/database/migrations';

        $this->loadMigrationsFrom($packageMigrationsPath);

        $this->publishes([
            $packageMigrationsPath => database_path('migrations')
        ], 'ik-kabupaten-kota-migrations');
    }

    public function publicHandle()
    {
        $packagePublicPath = __DIR__.'/public';

        $this->publishes([
            $packagePublicPath => base_path('public')
        ], 'ik-kabupaten-kota-public');
    }

    public function seedHandle()
    {
        $packageSeedPath = __DIR__.'/database/seeds';

        $this->publishes([
            $packageSeedPath => base_path('database/seeds')
        ], 'ik-kabupaten-kota-seeds');
    }
}
