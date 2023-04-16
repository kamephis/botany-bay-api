<?php

namespace App\Controller;

use App\Repository\PlantRepository;
use App\Service\Serializer\DTOSerializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlantsController extends AbstractController
{
    public function __construct(
        private PlantRepository $repository
    )
    {
    }

    /**
     * @param DTOSerializer $serializer
     * @return Response
     */
    #[Route('/plants', name: 'plants')]
    public function index(
        DTOSerializer $serializer
    ): Response
    {
        $plants = $this->repository->findAll(); // add error handling
        $responseContent = $serializer->serialize($plants, 'json');

        return new Response($responseContent, 200);
    }

    /**
     * @param int $id
     * @param DTOSerializer $serializer
     * @return Response
     */
    #[Route('/plants/{id}', name: 'plant')]
    public function getPlantById(
        int           $id,
        DTOSerializer $serializer
    ): Response
    {
        $plant = $this->repository->find($id); // add error handling
        $responseContent = $serializer->serialize($plant, 'json');

        return new Response($responseContent, 200);
    }
}
