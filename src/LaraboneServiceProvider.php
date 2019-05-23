<?php

namespace Freepeace\Larabone;

use Illuminate\Support\ServiceProvider;

class LaraboneServiceProvider extends ServiceProvider
{
    public function boot()
    {
        self::registerHelpers();

        // $this->publishes([
        //     __DIR__.'/../config/larabone.php' => config_path('larabone.php'),
        // ], 'larabone');
    }

    private static function registerHelpers()
    {
        if (file_exists($file = __DIR__.'/helpers.php')) {
            require $file;
        }
    }
}
