<?php

namespace App\Providers;

use App\LaravelPackage;
use App\Parsers\ComposerJson;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Only register generator commands if the application is in production mode
        if ($this->app->environment('production')) {
            $this->commands([
                \App\Commands\Generators\ModelMakeCommand::class,
                \App\Commands\Generators\MigrateMakeCommand::class,
                \App\Commands\Generators\FactoryMakeCommand::class,
                \App\Commands\Generators\ControllerMakeCommand::class,
                \App\Commands\Generators\SeederMakeCommand::class,
            ]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ComposerJson::class, function () {
            return ComposerJson::load(LaravelPackage::path('composer.json'));
        });
    }
}
