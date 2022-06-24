<?php

namespace App\Service\Admin;

use App\Entity\VehicleCategory;
use App\Structure\Interfaces\CategoryServiceInterface;
use Doctrine\ORM\EntityManagerInterface;

class CategoryService implements CategoryServiceInterface
{
    private string $entity = VehicleCategory::class;

    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->entityManager
            ->getRepository($this->entity)
            ->findBy([], ['id' => 'desc']);
    }
}
