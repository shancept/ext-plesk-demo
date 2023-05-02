<?php

declare(strict_types=1);

namespace {{cookiecutter.namespace}}\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{

    #[Route('/test', name: 'test')]
    public function __invoke(): JsonResponse
    {
        return $this->json(['test' => 'test']);
    }
}
