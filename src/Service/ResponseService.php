<?php

namespace App\Service;

class ResponseService
{
    private static $status;
    private static $message;
    private static $data;

    /**
     * @param string $class
     * @param string $title
     * @param string $description
     */
    public static function flashMessage(string $class, string $title, string $description) : void
    {
        SessionService::getFlashBag()->clear();
        SessionService::getFlashBag()->add('message', [
            'class' => $class,
            'title' => $title,
            'description' => $description
        ]);
    }

    /**
     * @param bool $status
     * @param array $message
     * @param array $data
     * @throws \Exception
     */
    public static function terminate(bool $status, array $message, array $data = []) : void
    {
        self::$status = $status;
        self::$message = $message;
        self::$data = $data;
        self::flashMessage($status ? 'success' : 'danger', $message['title'], $message['description']);

        throw new \Exception($message['description']);
    }

    public static function getResponse() : array
    {
        return [
          'status' => self::$status,
          'message' => self::$message,
          'data' => self::$data
        ];
    }
}
