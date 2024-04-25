<?php

namespace App\Controller;

use App\Entity\Matiére;
use App\Form\MatiéreType;
use App\Repository\MatiéreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/mati/re')]
class MatiéreController extends AbstractController
{
    #[Route('/', name: 'app_mati_re_index', methods: ['GET'])]
    public function index(MatiéreRepository $matiéreRepository): Response
    {
        return $this->render('matiére/index.html.twig', [
            'mati_res' => $matiéreRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_mati_re_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $matiére = new Matiére();
        $form = $this->createForm(MatiéreType::class, $matiére);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($matiére);
            $entityManager->flush();

            return $this->redirectToRoute('app_mati_re_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('matiére/new.html.twig', [
            'mati_re' => $matiére,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_mati_re_show', methods: ['GET'])]
    public function show(Matiére $matiére): Response
    {
        return $this->render('matiére/show.html.twig', [
            'mati_re' => $matiére,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_mati_re_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Matiére $matiére, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MatiéreType::class, $matiére);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_mati_re_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('matiére/edit.html.twig', [
            'mati_re' => $matiére,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_mati_re_delete', methods: ['POST'])]
    public function delete(Request $request, Matiére $matiére, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$matiére->getId(), $request->request->get('_token'))) {
            $entityManager->remove($matiére);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_mati_re_index', [], Response::HTTP_SEE_OTHER);
    }
}
