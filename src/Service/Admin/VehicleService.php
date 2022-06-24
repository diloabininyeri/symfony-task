<?php

namespace App\Service\Admin;

use App\Entity\Vehicle;
use App\Structure\Interfaces\VehicleServiceInterface;
use Doctrine\ORM\EntityManagerInterface;

/**
 *
 */
class VehicleService implements VehicleServiceInterface
{
    /**
     *
     */
    private const ENTITY = Vehicle::class;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    /**
     * @param int $id
     * @return Vehicle|null
     */
    public function find(int $id): Vehicle|null
    {
        return $this->entityManager
            ->getRepository(self::ENTITY)
            ->find($id);
    }
}
