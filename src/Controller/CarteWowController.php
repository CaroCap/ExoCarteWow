<?php

namespace App\Controller;

use App\Entity\Carte;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarteWowController extends AbstractController
{
    #[Route('/carte/wow', name: 'carte_wow')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $rep = $em->getRepository(Carte::class);
        $cartes = $rep->findAll();
        $vars = ['cartes' => $cartes];

        return $this->render('carte_wow/index.html.twig', $vars);
    }
}
