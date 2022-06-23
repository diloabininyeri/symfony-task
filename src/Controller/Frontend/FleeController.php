<?php

namespace App\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FleeController extends AbstractController
{
    #[Route('/fleet.html', name: 'app_fleet')]
    public function index(): Response
    {
        return $this->render('fleet/index.html.twig', [
            'controller_name' => 'FleeController',
        ]);
    }
}
