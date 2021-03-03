<?php

namespace App\Controller;

use App\Entity\Publicatie;
use App\Form\PublicatieType;
use App\Repository\PublicatieRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/publicatie")
 *
 */
class PublicatieController extends AbstractController
{
    /**
     * @Route("/", name="publicatie_index", methods={"GET"})
     */
    public function index(PublicatieRepository $publicatieRepository): Response
    {
        return $this->render('publicatie/index.html.twig', [
            'publicaties' => $publicatieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="publicatie_new", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function new(Request $request): Response
    {
        $publicatie = new Publicatie();
        $form = $this->createForm(PublicatieType::class, $publicatie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($publicatie);
            $entityManager->flush();

            return $this->redirectToRoute('publicatie_index');
        }

        return $this->render('publicatie/new.html.twig', [
            'publicatie' => $publicatie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="publicatie_show", methods={"GET"})
     */
    public function show(Publicatie $publicatie): Response
    {
        return $this->render('publicatie/show.html.twig', [
            'publicatie' => $publicatie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="publicatie_edit", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function edit(Request $request, Publicatie $publicatie): Response
    {
        $form = $this->createForm(PublicatieType::class, $publicatie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('publicatie_index');
        }

        return $this->render('publicatie/edit.html.twig', [
            'publicatie' => $publicatie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="publicatie_delete", methods={"DELETE"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, Publicatie $publicatie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$publicatie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($publicatie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('publicatie_index');
    }
}
