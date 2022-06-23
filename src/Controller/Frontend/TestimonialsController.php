<?php

namespace App\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestimonialsController extends AbstractController
{
    #[Route('/testimonials.html', name: 'app_testimonials')]
    public function index(): Response
    {
        return $this->render('testimonials/index.html.twig', [
            'controller_name' => 'TestimonialsController',
        ]);
    }
}
