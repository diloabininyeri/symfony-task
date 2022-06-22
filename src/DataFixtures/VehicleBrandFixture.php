<?php

namespace App\DataFixtures;

use App\Entity\VehicleBrand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VehicleBrandFixture extends Fixture
{
    /**
     * @todo In fact, brands could be created with the faker library, but this is enough to give an idea.
     */
    private array $brands = [
        'bmw',
        'audio',
        'mercedes',
        'honda',
        'yamaha'
    ];

    public function load(ObjectManager $manager): void
    {

        foreach ($this->brands as $brand) {

            $vehicleBrand = new VehicleBrand();
            $vehicleBrand->setName($brand);
            $manager->persist($vehicleBrand);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
