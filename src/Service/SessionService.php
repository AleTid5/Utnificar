<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Session\Session;

class SessionService extends AbstractService
{
    protected static $instance;
    protected static $class = Session::class;

    public static function getInstance()
    {
        try {
            self::setInstance();
        } finally {
            return self::$instance;
        }
    }

    public static function setInstance()
    {
        self::$instance = new self::$class();
        self::$instance->start();
    }
}
