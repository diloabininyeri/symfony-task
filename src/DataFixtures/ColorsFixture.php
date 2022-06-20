<?php

namespace App\DataFixtures;

use App\Entity\Color;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 *
 */
class ColorsFixture extends Fixture
{
    /**
     * @var array|string[]
     */
    private array $colors = [
        'blue', 'red', 'white', 'black', 'green', 'gray'
    ];

    /**
     * @param ObjectManager $manager
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        foreach ($this->colors as $color) {
            $colorEntity = new Color();
            $colorEntity->setName($color);
            $colorEntity->setCreatedAt(new \DateTimeImmutable('now'));
            $manager->persist($colorEntity);
        }


        $manager->flush();
    }
}
