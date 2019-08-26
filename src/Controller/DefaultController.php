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

class DefaultController extends Controller
{

  /**
   * @Route("/cms", name="cms", methods={"GET"})
   */
  public function cms(ParcoursRepository $ParcoursRepository): Response
  {
      return $this->render('base/cms.html.twig', [
            'Parcours' => $ParcoursRepository->findAll(),
        ]);
  }

    /**
     * @Route("/competences", name="competences")
     */
    public function competences()
    {
        return $this->render('base/competences.html.twig');
    }

    /**
     * @Route("/lectures-competences", name="lectures-competences")
     */
    public function lectures_competences()
    {
        return $this->render('base/lectures_competences.html.twig');
    }

    /**
     * @Route("/projets", name="projets")
     */
    public function projets()
    {
        return $this->render('base/projets.html.twig');
    }

    /**
     * @Route("/lectures-projets", name="lectures-projets")
     */
    public function lectures_projets()
    {
        return $this->render('base/lectures_projets.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('base/contact.html.twig');
    }

    /**
     * @Route("/mentions-legales", name="mentions-legales")
     */
    public function mentions_legales()
    {
        return $this->render('base/mentions_legales.html.twig');
    }


}
