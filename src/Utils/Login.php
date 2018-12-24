<?php

namespace App\Utils;

use Symfony\Component\Validator\Constraints\Email;

class Login {
    public function checkCredentials($email, $password)
    {
        $email = new Email();
    }
}