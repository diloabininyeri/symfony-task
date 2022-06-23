<?php

namespace App\Traits;

use App\Entity\User;
use Symfony\Component\Security\Core\User\UserInterface;

trait CheckAdmin
{
    /**
     * @param UserInterface|null $user
     * @return void
     */
    private function checkIsAdmin(?UserInterface $user): void
    {
        /**
         * @var User $user
         */
        $this->abortIf(!($user?->isAdmin()), 'page page not found');
    }
}
