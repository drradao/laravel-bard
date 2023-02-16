<?php

namespace App\Providers;

use Illuminate\Database\Migrations\MigrationCreator;
use Illuminate\Support\ServiceProvider;

class MigrationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Load only the migration creator, not the entire migration service provider
        $this->app->singleton(MigrationCreator::class, function ($app) {
            return new MigrationCreator($app['files'], $app->basePath('stubs'));
        });
    }
}
