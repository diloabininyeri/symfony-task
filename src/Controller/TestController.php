<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Vehicle;
use App\EventListener\VehicleRentedEvent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(EventDispatcherInterface $dispatcher): Response
    {
        $dispatcher->dispatch(new VehicleRentedEvent(new Vehicle(), new User()), VehicleRentedEvent::NAME);
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
