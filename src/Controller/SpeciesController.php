<?php

namespace App\Controller;

use App\Service\Serializer\DTOSerializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\SpeciesRepository;

class SpeciesController extends AbstractController
{
    public function __construct(
        private SpeciesRepository $repository
    )
    {
    }

    #[Route('/species', name: 'app_species')]
    public function index(
        DTOSerializer $serializer,
    ): Response
    {
        $species = $this->repository->findAll();
        $responseContent = $serializer->serialize($species, 'json');

        return new Response($responseContent, 200);
    }

    #[Route('/species/{id}', name: 'app_species_by_id')]
    public function getSpeciesById(
        DTOSerializer $serializer,
        int           $id
    ): Response
    {
        $species = $this->repository->find($id);
        $responseContent = $serializer->serialize($species, 'json');

        return new Response($responseContent, 200);
    }
}
