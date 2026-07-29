<?php

namespace App\Controller;

use App\Entity\StockConsommable;
use App\Form\StockConsommableType;
use App\Repository\StockConsommableRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/stock/consommable')]
final class StockConsommableController extends AbstractController
{
    #[Route(name: 'app_stock_consommable_index', methods: ['GET'])]
    public function index(StockConsommableRepository $stockConsommableRepository): Response
    {
        return $this->render('stock_consommable/index.html.twig', [
            'stock_consommables' => $stockConsommableRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_stock_consommable_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $stockConsommable = new StockConsommable();
        $form = $this->createForm(StockConsommableType::class, $stockConsommable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($stockConsommable);
            $entityManager->flush();

            return $this->redirectToRoute('app_stock_consommable_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('stock_consommable/new.html.twig', [
            'stock_consommable' => $stockConsommable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_stock_consommable_show', methods: ['GET'])]
    public function show(StockConsommable $stockConsommable): Response
    {
        return $this->render('stock_consommable/show.html.twig', [
            'stock_consommable' => $stockConsommable,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_stock_consommable_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, StockConsommable $stockConsommable, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(StockConsommableType::class, $stockConsommable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_stock_consommable_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('stock_consommable/edit.html.twig', [
            'stock_consommable' => $stockConsommable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_stock_consommable_delete', methods: ['POST'])]
    public function delete(Request $request, StockConsommable $stockConsommable, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stockConsommable->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($stockConsommable);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_stock_consommable_index', [], Response::HTTP_SEE_OTHER);
    }
}
