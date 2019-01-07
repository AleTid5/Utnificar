<?php
namespace App\Controller;

use App\Traits\AuthTrait;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    use AuthTrait;

    public function __construct()
    {
        $this->authController();
    }

    public function dashboard() : Response
    {
        if ($this->isAdmin()) {
            return new Response($this->renderView('auth/admin/dashboard/index.twig'));
        }

        return new Response($this->renderView('auth/dashboard/index.twig'));
    }
}