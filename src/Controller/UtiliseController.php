<?php

namespace App\Controller;

use App\Entity\Utilise;
use App\Form\UtiliseType;
use App\Repository\UtiliseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/utilise')]
final class UtiliseController extends AbstractController
{
    #[Route(name: 'app_utilise_index', methods: ['GET'])]
    public function index(UtiliseRepository $utiliseRepository): Response
    {
        return $this->render('utilise/index.html.twig', [
            'utilises' => $utiliseRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_utilise_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $utilise = new Utilise();
        $form = $this->createForm(UtiliseType::class, $utilise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($utilise);
            $entityManager->flush();

            return $this->redirectToRoute('app_utilise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilise/new.html.twig', [
            'utilise' => $utilise,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_utilise_show', methods: ['GET'])]
    public function show(Utilise $utilise): Response
    {
        return $this->render('utilise/show.html.twig', [
            'utilise' => $utilise,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_utilise_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Utilise $utilise, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UtiliseType::class, $utilise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_utilise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilise/edit.html.twig', [
            'utilise' => $utilise,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_utilise_delete', methods: ['POST'])]
    public function delete(Request $request, Utilise $utilise, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$utilise->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($utilise);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_utilise_index', [], Response::HTTP_SEE_OTHER);
    }
}
