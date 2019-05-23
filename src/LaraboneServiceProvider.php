<?php

namespace Freepeace\Larabone;

use Illuminate\Support\ServiceProvider;

class LaraboneServiceProvider extends ServiceProvider
{
    public function boot()
    {
        self::registerHelpers();
    }

    private static function registerHelpers()
    {
        if (file_exists($file = __DIR__.'/helpers.php')) {
            require $file;
        }
    }
}
