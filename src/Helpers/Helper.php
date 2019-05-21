<?php

namespace Freepeace\Larabone\Helpers;

class Helper
{
    private $helperNamespaces = [
        'Freepeace\\Larabone\\Helpers',
        'App\\Helpers'
    ];

    public function call(string $class = null, string $method = null, ...$args)
    {
        $helper = $this->getHelperClass($class);

        if (!method_exists(new $helper(), $method)) {
            throw new \BadMethodCallException($class.' method '. $method .' not exists.');
        }

        call_user_func_array([new $helper(), $method], $args);
    }

    private function getHelperClass($class)
    {
        foreach ($this->helperNamespaces as $namespace) {
            $class = $namespace.'\\'.$class;
            if (class_exists($class)) return $class;
        }

        throw new \InvalidArgumentException('Helper class not exists.');
    }
}
