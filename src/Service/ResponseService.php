<?php

namespace App\Service;

class ResponseService
{
    public static function flashMessage($class, $title, $description)
    {
        SessionService::getFlashBag()->clear();
        SessionService::getFlashBag()->add('message', [
            'class' => $class,
            'title' => $title,
            'description' => $description
        ]);
    }

    public static function restoreView(array $view)
    {

    }
}
