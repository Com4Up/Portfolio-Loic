<?php

namespace App\Controller;

use App\Entity\Competences;
use App\Form\CompetencesType;
use App\Repository\CompetencesRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class CompetencesController extends AbstractController
{
  /**
   * @Route("/competences", name="competences", methods={"GET"})
   */
  public function competences(CompetencesRepository $CompetencesRepository): Response
  {
      return $this->render('base/competences.html.twig', [
            'Competences' => $CompetencesRepository->findAll(),
        ]);
  }

  /**
   * @Route("/competences/{id}", name="lectures-competences", methods={"GET"})
   */
  public function lectures_competences(Competences $Competences): Response
  {
      return $this->render('base/lectures_competences.html.twig', [
          'Competences' => $Competences,
      ]);
  }

  /**
 * @Route("/new-competences", name="competences_new", methods={"GET","POST"})
 */
public function Competences_new(Request $request): Response
{
    $Competences = new Competences();
    $form = $this->createForm(CompetencesType::class, $Competences);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($Parcours);
        $entityManager->flush();

        return $this->redirectToRoute('competences');
    }

    return $this->render('competences/Competences_new.html.twig', [
        'Competences' => $Competences,
        'form' => $form->createView(),
    ]);
}

/**
 * @Route("competences/delete/{id}", name="competences_delete", methods={"DELETE"})
 */
public function delete(Request $request, Competences $Competences): Response
{
    if ($this->isCsrfTokenValid('delete'.$Parcours->getId(), $request->request->get('_token'))) {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($Parcours);
        $entityManager->flush();
    }

    return $this->redirectToRoute('cms');
}

}
