<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\AnnonceType;
use App\Entity\Annonce;


class AddAnnonceController extends AbstractController
{
    /**
     * @Route("/addannonce", name="add_annonce")
     */
    public function index(Request $request): Response
    {

        $annonce = new Annonce();

        $form = $this->createForm(AnnonceType::class, $annonce);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $annonce = $form->getData();
            var_dump($annonce);

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annonce);
            $entityManager->flush();

            return $this->redirect('/annonce');
        }

        return $this->render('add_annonce/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
