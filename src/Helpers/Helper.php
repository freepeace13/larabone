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
        $class = ucfirst(strtolower($class));

        foreach ($this->getNamespaces() as $namespace) {
            $classNamespace = $namespace."\\{$class}";
            if (class_exists($classNamespace)) return $classNamespace;
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
