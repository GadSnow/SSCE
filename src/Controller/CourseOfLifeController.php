<?php

namespace App\Controller;

use App\Entity\CourseOfLife;
use App\Form\CourseOfLifeType;
use App\Repository\CourseOfLifeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/ssceadmin/cv')]
class CourseOfLifeController extends AbstractController
{
    #[Route('/', name: 'app_course_of_life_index', methods: ['GET'])]
    public function index(CourseOfLifeRepository $courseOfLifeRepository): Response
    {
        // dd($courseOfLifeRepository->getAll());
        return $this->render('course_of_life/index.html.twig', [
            'course_of_lives' => $courseOfLifeRepository->getAll(),
        ]);
    }

    #[Route('/new', name: 'app_course_of_life_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CourseOfLifeRepository $courseOfLifeRepository, SluggerInterface $slugger, EntityManagerInterface $em): Response
    {
        $courseOfLife = new CourseOfLife();
        $form = $this->createForm(CourseOfLifeType::class, $courseOfLife);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $courseOfLifeRepository->save($courseOfLife, true);

            return $this->redirectToRoute('app_course_of_life_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('course_of_life/new.html.twig', [
            'course_of_life' => $courseOfLife,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_course_of_life_show', methods: ['GET'])]
    public function show(CourseOfLife $courseOfLife): Response
    {
        return $this->render('course_of_life/show.html.twig', [
            'course_of_life' => $courseOfLife,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_course_of_life_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CourseOfLife $courseOfLife, CourseOfLifeRepository $courseOfLifeRepository): Response
    {
        $form = $this->createForm(CourseOfLifeType::class, $courseOfLife);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $courseOfLifeRepository->save($courseOfLife, true);

            return $this->redirectToRoute('app_course_of_life_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('course_of_life/edit.html.twig', [
            'course_of_life' => $courseOfLife,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_course_of_life_delete', methods: ['POST'])]
    public function delete(Request $request, CourseOfLife $courseOfLife, CourseOfLifeRepository $courseOfLifeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $courseOfLife->getId(), $request->request->get('_token'))) {
            $courseOfLifeRepository->remove($courseOfLife, true);
        }

        return $this->redirectToRoute('app_course_of_life_index', [], Response::HTTP_SEE_OTHER);
    }
}
