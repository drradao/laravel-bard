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
                \App\Commands\Generators\PolicyMakeCommand::class,
                \App\Commands\Generators\RequestMakeCommand::class,
                \App\Commands\Generators\JobMakeCommand::class,
                \App\Commands\Generators\ConsoleMakeCommand::class,
                \App\Commands\Generators\TestMakeCommand::class,
                \App\Commands\Generators\EventMakeCommand::class,
                \App\Commands\Generators\ListenerMakeCommand::class,
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
