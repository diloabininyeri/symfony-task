<?php

namespace App\Controller;

use App\Structure\Interfaces\TestServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[
        Route('/', name: 'app_home'),
        Route('/index.html', name: 'app_home_with_index'),
    ]
    public function index(TestServiceInterface $testService): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
