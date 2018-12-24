<?php
namespace App\Controller;

use App\Utils\Login;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function index(array $view = []) : Response
    {
        return new Response($this->renderView('non-auth/login/index.twig', $view));
    }

    public function forgot(array $view = []) : Response
    {
        return new Response($this->renderView('non-auth/login/forgot.twig', $view));
    }

    public function register(array $view = []) : Response
    {
        return new Response($this->renderView('non-auth/login/register.twig', $view));
    }

    public function authenticate(Request $request) : Response
    {
        try {
            (new Login())->checkCredentials($request->request->get('email'), $request->request->get('password'));
            return new Response($this->renderView('non-auth/login/index.twig'));
        } catch (\Exception $e) {

        }
    }
}