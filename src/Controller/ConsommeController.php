<?php

namespace App\Controller;

use App\Entity\Consomme;
use App\Form\ConsommeType;
use App\Repository\ConsommeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/consomme')]
final class ConsommeController extends AbstractController
{
    #[Route(name: 'app_consomme_index', methods: ['GET'])]
    public function index(ConsommeRepository $consommeRepository): Response
    {
        return $this->render('consomme/index.html.twig', [
            'consommes' => $consommeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_consomme_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $consomme = new Consomme();
        $form = $this->createForm(ConsommeType::class, $consomme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($consomme);
            $entityManager->flush();

            return $this->redirectToRoute('app_consomme_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('consomme/new.html.twig', [
            'consomme' => $consomme,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_consomme_show', methods: ['GET'])]
    public function show(Consomme $consomme): Response
    {
        return $this->render('consomme/show.html.twig', [
            'consomme' => $consomme,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_consomme_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Consomme $consomme, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ConsommeType::class, $consomme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_consomme_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('consomme/edit.html.twig', [
            'consomme' => $consomme,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_consomme_delete', methods: ['POST'])]
    public function delete(Request $request, Consomme $consomme, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$consomme->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($consomme);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_consomme_index', [], Response::HTTP_SEE_OTHER);
    }
}
