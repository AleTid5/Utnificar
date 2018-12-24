<?php

namespace App\Service;

abstract class AbstractService
{
    public static function __callStatic($method, $args)
    {
        $instance = static::getInstance();

        if (! method_exists($instance, $method)) {
            return "No existe el método {$method}";
        }

        return $instance->$method(...$args);
    }

    public static function getInstance()
    {
    }

    public static function setInstance()
    {
    }
}
