<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/health', name: 'health_test', methods: ['GET'])]
    public function index(): JsonResponse
    {
        return $this->json(
            [
                'ok' => true
            ]
        );
    }
}
