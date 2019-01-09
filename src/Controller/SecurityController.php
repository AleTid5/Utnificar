<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/", name="app_login")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils) : Response
    {
        if ($this->isGranted(['ROLE_USER', 'ROLE_ADMIN'])) {
            return $this->redirectToRoute('dashboard');
        }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('non-auth/login/index.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @param $route
     * @return RedirectResponse
     */
    public function error_404($route) : RedirectResponse
    {
        $this->addFlash('errorMessage', 'Aún no se ha habilitado la sección "' . $route . '"');

        if ($this->isGranted(['ROLE_USER', 'ROLE_ADMIN'])) {
            return $this->redirectToRoute('dashboard');
        }

        return $this->redirectToRoute('login');
    }
}
