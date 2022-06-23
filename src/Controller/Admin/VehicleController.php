<?php

namespace App\Controller\Admin;


namespace App\Controller\Admin;

use App\Entity\Vehicle;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VehicleController extends AbstractController
{
    #[Route('/admin/vehicles', name: 'app_admin_vehicles')]
    public function index(EntityManagerInterface $entityManager): Response
    {

        // @todo this should be paginate
        $vehicles = $entityManager->getRepository(Vehicle::class)->findAll();
        return $this->render(
            'admin/vehicles.html.twig',
            compact('vehicles')
        );
    }
}
