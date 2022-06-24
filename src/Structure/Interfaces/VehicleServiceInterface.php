<?php

namespace App\Structure\Interfaces;

use App\Entity\Vehicle;

interface VehicleServiceInterface
{
    public function find(int $id): ?Vehicle;
}
