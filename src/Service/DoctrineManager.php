<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

/**
 *
 */
class DoctrineManager
{
    /**
     * @param EntityManagerInterface $managerRegistry
     */
    public function __construct(private readonly EntityManagerInterface $managerRegistry)
    {
    }

    /**
     * @return EntityManagerInterface
     *
     */
    public function getManager(): EntityManagerInterface
    {
        return $this->managerRegistry;
    }

    /**
     * @param string $class
     * @return EntityRepository
     */
    public function getRepository(string $class): EntityRepository
    {
        return $this->managerRegistry->getRepository($class);
    }
}
