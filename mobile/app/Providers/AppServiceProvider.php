<?php

namespace App\Providers;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        if ($this->app->environment(LOCAL)) {
            /* @see \Laravel\Lumen\Application::configure() */
            $this->app->configure('ide-helper');
            $this->app->register(IdeHelperServiceProvider::class);
        }
    }
}
