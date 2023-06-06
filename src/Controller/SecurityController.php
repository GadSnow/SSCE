<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * form used for handling the security
 */
class SecurityController extends AbstractController
{
    #[Route('/login', name: 'app_security')]
    /**
     * Summary of index
     * @param \Symfony\Component\Security\Http\Authentication\AuthenticationUtils $auth
     * @return \Symfony\Component\HttpFoundation\Response
     */
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
