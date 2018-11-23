<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function index()
    {
        return new Response($this->renderView('non-auth/login/index.twig'));
    }

    public function authenticate(Request $request)
    {
        return new Response($this->renderView('non-auth/login/index.twig'));
        dump($request); die;
    }
}