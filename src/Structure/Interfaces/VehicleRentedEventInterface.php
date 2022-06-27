<?php

namespace App\Structure\Interfaces;

use App\Entity\User;
use App\Entity\Vehicle;

/**
 *
 */
interface VehicleRentedEventInterface
{
    /**
     * @return Vehicle
     */
    public function getVehicle(): Vehicle;

    /**
     * @return User
     */
    public function getUser(): User;
}
