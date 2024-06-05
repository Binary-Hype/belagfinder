<?php

namespace App\Providers;

use App\Console\Commands\RunPhpStan;
use App\Services\MaterialService;
use App\Services\OpenAIService;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('MaterialService', function ($app) {
            return new MaterialService();
        });

        $this->app->singleton('OpenAIService', function ($app) {
            return new OpenAIService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $loader = AliasLoader::getInstance();
        $loader->alias('MaterialService', MaterialService::class);
    }
}
