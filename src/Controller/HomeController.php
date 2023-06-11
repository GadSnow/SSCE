<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_first')]
    /**
     * Summary of firstPage
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function firstPage()
    {
        return $this->redirectToRoute('app_home');
    }

    #[Route('/ssceadmin', name: 'app_home')]
    /**
     * Summary of index
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(): Response
    {
        return $this->redirectToRoute('app_student_index');
    }
}
