<?php

namespace App\EventSubscriber;

use App\EventListener\VehicleRentedEvent;
use JetBrains\PhpStorm\ArrayShape;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 *
 */
class VehicleRentedSubscriber implements EventSubscriberInterface
{
    /**
     * @return string[]
     */
    #[ArrayShape([VehicleRentedEvent::NAME => "string"])]
    public static function getSubscribedEvents(): array
    {
        return [
            VehicleRentedEvent::NAME => 'onRented'
        ];
    }

    /**
     * @param VehicleRentedEvent $event
     * @return void
     */
    public function onRented(VehicleRentedEvent $event): void
    {

        //@todo should use queue operations

        $user=$event->getUser();
        $vehicle=$event->getVehicle();
    }
}
