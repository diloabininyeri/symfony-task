<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\MigratingPasswordHasher;

/**
 *
 */
class AdminFixture extends Fixture
{
    /**
     * you can create different password => symfony console security:hash-password admin
     * @var string
     */
    private string $password = '$2y$13$tpL2cdzgJgKwwM/BA0X2bult51xIwx8SvwQ3cvi2lPEe6LksWGrke';  //admin

    /**
     * @param ObjectManager $manager
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('admin@admin.com');
        $user->giveRoleAdminPermission();
        $user->setFullName('Anto Pujić ');
        $user->setPassword($this->createHashPassword());
        $manager->persist($user);

        $manager->flush();
    }

    /**
     * @return string
     */
    private function createHashPassword(): string
    {
        return $this->password;
    }
}
