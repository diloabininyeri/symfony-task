<?php

namespace App\Controller\Admin;

namespace App\Controller\Admin;

use App\Entity\Vehicle;
use App\Structure\Interfaces\VehicleServiceInterface;
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
    public function index(VehicleServiceInterface $service): Response
    {

        // @todo this should be paginate
        $vehicles =$service->findAll();
        return $this->render(
            'admin/vehicle/vehicles.html.twig',
            compact('vehicles')
        );
    }

    #[
        Route('/admin/vehicle/{id}', name: 'app_admin_vehicle_detail'),
    ]
    public function show(VehicleServiceInterface $service, int $id): Response
    {
        $vehicle = $service->find($id);
        return $this->render(
            'admin/vehicle/vehicle_detail.html.twig',
            compact('vehicle')
        );
    }
}
