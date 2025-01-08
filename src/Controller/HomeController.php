<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    //  Pour réécrire l'url de /home en https://127.0.0.1:8000/ plus joliment écrit / puis actualiser dans le navigateur
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        // $name = "Angelique";

        return $this->render('home/index.html.twig', [

            // Tableau associatif les variables twig première partie pourront être retournées
            // 'controller_name' => 'HomeController',
            // 'My_name' => $name,
            // mise en relief de la page ACTIVE
            'page' => 'app_home'
        ]);
    }
}
