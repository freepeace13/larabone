<?php

namespace Freepeace\Larabone\Helpers;

class Helper
{
    private $namespace = 'Freepeace\\Larabone\\Helpers';

    public function call(string $class = null, string $method = null, ...$args)
    {
        $instance = $this->getHelperInstance($class);

        if (!method_exists($instance, $method)) {
            throw new \BadMethodCallException("{$class} class method name {$method} not exists.");
        }

        return call_user_func_array(array($instance, $method), $args);
    }

    public function getHelperClass(string $class)
    {
        foreach ($this->getNamespaces() as $namespace) {
            $class = $namespace."\\{$class}";
            if (class_exists($class)) return $class;
        }

        throw new \InvalidArgumentException("Helper class name {$class} not exists.");
    }

    public function getHelperInstance(string $class)
    {
        $helper = $this->getHelperClass($class);
        return new $helper();
    }

    private function getNamespaces()
    {
        return array($this->namespace, config('larabone.helper.namespace'));
    }
}
