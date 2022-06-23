<?php

namespace App\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TermController extends AbstractController
{
    #[Route('/terms.html', name: 'app_term')]
    public function index(): Response
    {
        return $this->render('term/index.html.twig', [
            'controller_name' => 'TermController',
        ]);
    }
}
