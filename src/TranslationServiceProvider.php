<?php

namespace TypiCMS\Modules\TransDB;

use TypiCMS\Modules\TransDB\Commands\TranslaionSync;
use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\Filesystem;

class TranslationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/transdb.php' => config_path('transdb.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/transdb.php', 'transdb');

        $this->app->bind(TranslationManager::class, function () {
            return new TranslationManager(
                new Filesystem,
                $this->app['config']['transdb.path'],
                array_merge($this->app['config']['view.paths'], [$this->app['path']], [base_path('Modules')])
            );
        });

        $this->commands([
            TranslaionSync::class,
        ]);
    }
}
