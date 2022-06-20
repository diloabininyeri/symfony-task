<?php

namespace App\Service;

use App\Entity\User;
use App\Entity\Vehicle;
use App\Structure\Interfaces\TestServiceInterface;
use Doctrine\Persistence\ManagerRegistry;

class TestService implements TestServiceInterface
{
    private ManagerRegistry $managerRegistry;

    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
    }


    public function test(): array
    {
        $vehicle = $this->managerRegistry->getRepository(Vehicle::class)->find(1);

        dd($vehicle->getColor()->getName());
    }
}
