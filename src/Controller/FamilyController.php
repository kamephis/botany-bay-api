<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FamilyController extends AbstractController
{
    #[Route('/family', name: 'app_family')]
    public function index(): Response
    {
        return $this->render('family/index.html.twig', [
            'controller_name' => 'FamilyController',
        ]);
    }
}
