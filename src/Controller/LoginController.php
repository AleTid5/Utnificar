<?php
namespace App\Controller;

use App\Service\SessionService;
use App\Utils\Login;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function index(array $view = []) : Response
    {
        SessionService::clear();
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

    public function dashboard() : Response
    {
        return new Response($this->renderView('auth/dashboard/index.twig'));
    }

    public function authenticate(Request $request) : RedirectResponse
    {
        try {
            (new Login($this->getDoctrine()))->checkCredentials(
                $request->request->get('email'),
                $request->request->get('password'));

            return new RedirectResponse('dashboard');
        } catch (\Exception $e) {
            return new RedirectResponse('/');
        }
    }
}