<?php
namespace App\Utils;

use App\Entity\User;
use App\Service\SessionService;

class Login extends AbstractManagerRegistry
{
    /**
     * @param $email
     * @param $password
     * @throws \Exception
     */
    public function checkCredentials($email, $password)
    {
        Validator::assertEmail($email);
        Validator::assertPassword($password);
        $password = md5($password);

        $user = $this->doctrine
            ->getRepository(User::class)
            ->findOneBy([
                'email' => $email,
                'password' => $password,
                'status' => 1,
            ]);

        Validator::assertNull($user, [
            'title' => 'Usuario inválido',
            'description' => 'Las credenciales ingresadas son incorrectas.'
        ]);

        SessionService::set('userID', $user->getId());
        SessionService::set('userName', $user->getName());
        SessionService::set('userLastName', $user->getLastname());
        SessionService::set('userType', $user->getUserType());

        $user->setLoginCounter($user->getLoginCounter() + 1);
        $this->doctrine->getManager()->flush();
    }
}