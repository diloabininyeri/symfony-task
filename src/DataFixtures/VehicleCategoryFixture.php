<?php

namespace App\DataFixtures;

use App\Entity\VehicleCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 *
 */
class VehicleCategoryFixture extends Fixture
{
    /**
     * @var array
     */
    private array $categories = [
        [
            'name' => 'motorcycle',
            'description' => 'motorcycle category description'
        ],
        [
            'name' => 'car',
            'description' => 'bus  category content foo bar'
        ],
        [
            'name' => 'airplane',
            'description' => 'airplane   category content foo bar,they can fly '
        ]
    ];

    /**
     * @param ObjectManager $manager
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        foreach ($this->categories as $category) {
            $vehicleCategory = new VehicleCategory();
            $vehicleCategory->setName($category['name']);
            $vehicleCategory->setDescription($category['description']);
            $manager->persist($vehicleCategory);
        }
        $manager->flush();
    }
}
