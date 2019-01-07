<?php
namespace App\Traits;

use App\Service\SessionService;
use Symfony\Component\HttpFoundation\RedirectResponse;

trait AuthTrait
{
    public function authController()
    {
        if (! SessionService::has('userID')) {
            exit(new RedirectResponse('/'));
        }
    }
    public function isAdmin()
    {
        return SessionService::get('userType') === "1";
    }
}