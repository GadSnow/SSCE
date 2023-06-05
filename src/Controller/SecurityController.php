<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route('/login', name: 'app_security')]
    public function index(AuthenticationUtils $auth): Response
    {
        $error = $auth->getLastAuthenticationError();
        $lastusername = $auth->getLastUsername();

        return $this->render('security/index.html.twig', [
            'controller_name' => 'SecurityController',
            'last_username' => $lastusername,
            'error' => $error
        ]);
    }
}
