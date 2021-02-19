<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AnnonceRepository;

class AnnonceDetailsController extends AbstractController
{
    /**
     * @Route("/annonce/{id}", name="annonce_details")
     */
    public function index(AnnonceRepository $annonceRepository, $id): Response
    {
        return $this->render('annonce_details/index.html.twig', [
            'annonce' => $annonceRepository->find($id),
        ]);
    }
}
