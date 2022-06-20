<?php

namespace App\Service;

use App\Entity\User;
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
        return $this->managerRegistry->getRepository(User::class)->findAll();
    }
}
