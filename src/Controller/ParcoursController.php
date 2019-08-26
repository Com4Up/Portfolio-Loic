<?php

namespace App\Controller;

use App\Entity\Parcours;
use App\Form\ParcoursType;
use App\Repository\ParcoursRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ParcoursController extends AbstractController
{
  /**
   * @Route("/", name="parcours", methods={"GET"})
   */
  public function index(ParcoursRepository $ParcoursRepository): Response
  {
      return $this->render('base/index.html.twig', [
            'Parcours' => $ParcoursRepository->findAll(),
        ]);
  }

  /**
   * @Route("/parcours/{id}", name="lectures_parcours", methods={"GET"})
   */
  public function lectures_parcours(Parcours $Parcours): Response
  {
      return $this->render('base/lectures_parcours.html.twig', [
          'Parcours' => $Parcours,
      ]);
  }

  /**
 * @Route("/new-parcours", name="Parcours_new", methods={"GET","POST"})
 */
public function Parcours_new(Request $request): Response
{
    $Parcours = new Parcours();
    $form = $this->createForm(ParcoursType::class, $Parcours);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($Parcours);
        $entityManager->flush();

        return $this->redirectToRoute('parcours');
    }

    return $this->render('parcours/Parcours_new.html.twig', [
        'Parcours' => $Parcours,
        'form' => $form->createView(),
    ]);
}

/**
 * @Route("parcours/delete/{id}", name="parcours_delete", methods={"DELETE"})
 */
public function delete(Request $request, Parcours $Parcours): Response
{
    if ($this->isCsrfTokenValid('delete'.$Parcours->getId(), $request->request->get('_token'))) {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($Parcours);
        $entityManager->flush();
    }

    return $this->redirectToRoute('cms');
}

}
