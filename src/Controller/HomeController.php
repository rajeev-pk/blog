<?php

namespace App\Controller;

use App\Repository\PublicatieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(PublicatieRepository $publicatieRepository): Response
    {

        return $this->render('home/index.html.twig', [
            'posts' => $publicatieRepository->findBy(array('viewable' => true))
        ]);
    }
}
