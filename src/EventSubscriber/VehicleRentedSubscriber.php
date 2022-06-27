<?php

namespace App\EventSubscriber;

use App\EventListener\VehicleRentedEvent;
use App\Structure\Interfaces\VehicleRentedEventInterface;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\NoReturn;
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
     * @param VehicleRentedEventInterface $event
     * @return void
     */
    #[NoReturn]
    public function onRented(VehicleRentedEventInterface $event): void
    {

        //@todo should use queue operations
        $user = $event->getUser();
        $vehicle = $event->getVehicle();
    }
}
