<?php

namespace App\EventListener;

use App\Entity\User;
use App\Entity\Vehicle;
use App\Structure\Interfaces\VehicleRentedEventInterface;

/**
 *
 */
class VehicleRentedEvent implements VehicleRentedEventInterface
{
    /**
     *
     */
    public const NAME = 'vehicle_rented_event';

    /***
     * @param Vehicle $vehicle
     * @param User $user
     */
    public function __construct(private readonly Vehicle $vehicle, private readonly User $user)
    {
    }

    /**
     * @return Vehicle
     */
    public function getVehicle(): Vehicle
    {
        return $this->vehicle;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @return string
     * @todo this method for example
     */
    public function getDate(): string
    {
        return (new \DateTime('now'))->format('Y-m-d H:i:s');
    }
}
