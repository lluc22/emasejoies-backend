<?php

namespace App\Controller;

use App\Repository\CollectionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CollectionController extends AbstractController
{
    #[Route('/api/collections', name: 'get_collection', methods: ['GET'])]
    public function getCollections(
        CollectionRepository $colRepo
    ): JsonResponse
    {
        $collections = $colRepo->findBy(['enabled' => true]);
        $result = [];
        foreach($collections as $collection){
            $collectionJson = [
                'name' => $collection->getName(),
                'description' => $collection->getDescription()
            ];
            $result[] = $collectionJson;
        }
        return $this->json($result);
    }
}
