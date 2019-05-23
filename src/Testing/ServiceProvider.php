<?php

namespace Freepeace\Larabone\Testing;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Freepeace\Larabone\Testing\ExceptionHandler as TestHandler;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/Route.php');

        $this->app->bind(ExceptionHandler::class, TestHandler::class);
    }
}
