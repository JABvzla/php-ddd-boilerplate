<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Application\Bus\Contracts\Container;
use App\Infrastructure\Bus\Contracts\CommandBus;
use App\Infrastructure\Bus\AppContainer;
use App\Infrastructure\AppCommandBus;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            CommandBus::class,
            AppCommandBus::class
        );

        $this->app->bind(
            Container::class,
            AppContainer::class
        );
    }
}
