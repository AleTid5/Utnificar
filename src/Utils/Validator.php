<?php
namespace App\Utils;

use App\Service\ResponseService;

class Validator
{
    /**
     * @param $email
     * @throws \Exception
     */
    public static function assertEmail($email) : void
    {
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            ResponseService::terminate(false, [
                'title' => 'E-Mail inválido',
                'description' => 'El E-Mail que ha enviado es inválido.'
            ]);
        }
    }

    /**
     * @param $password
     * @throws \Exception
     */
    public static function assertPassword($password) : void
    {
        if (null === $password || 0 === strlen(trim($password))) {
            ResponseService::terminate(false, [
                'title' => 'Contraseña inválida',
                'description' => 'La contraseña no es válida.'
            ]);
        }
    }

    /**
     * @param $null
     * @param $message
     * @throws \Exception
     */
    public static function assertNull($null, $message) : void
    {
        if (null === $null) {
            ResponseService::terminate(false, $message);
        }
    }
}