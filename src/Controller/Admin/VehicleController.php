<?php

namespace App\Controller\Admin;


namespace App\Controller\Admin;

use App\Entity\Vehicle;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted('ROLE_ADMIN')]
class VehicleController extends AbstractController
{
    #[
        Route('/admin/vehicles', name: 'app_admin_vehicles'),
    ]
    public function index(EntityManagerInterface $entityManager): Response
    {

        // @todo this should be paginate
        $vehicles = $entityManager->getRepository(Vehicle::class)->findAll();
        return $this->render(
            'admin/vehicle/vehicles.html.twig',
            compact('vehicles')
        );
    }

    #[
        Route('/admin/vehicle/{id}', name: 'app_admin_vehicle_detail'),
    ]
    public function show(int $id, EntityManagerInterface $entityManager): Response
    {

        $vehicle = $entityManager
            ->getRepository(Vehicle::class)
            ->find($id);

        return $this->render(
            'admin/vehicle/vehicle_detail.html.twig',
            compact('vehicle')
        );
    }
}
