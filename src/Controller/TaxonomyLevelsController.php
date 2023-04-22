<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaxonomyLevelsController extends AbstractController
{
    #[Route('/taxonomy/levels', name: 'app_taxonomy_levels')]
    public function index(): Response
    {
        return $this->render('taxonomy_levels/index.html.twig', [
            'controller_name' => 'TaxonomyLevelsController',
        ]);
    }
}
