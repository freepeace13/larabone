<?php

namespace Freepeace\Larabone;

use Illuminate\Support\ServiceProvider;

class LaraboneServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/larabone.php' => config_path('larabone.php'),
        ], 'config');
    }
}
