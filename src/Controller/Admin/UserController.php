<?php

namespace App\Controller\Admin;

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 *
 */
class UserController extends AbstractController
{
    #[
        Route('/admin/users', name: 'app_admin_users'),
        IsGranted('ROLE_ADMIN')
    ]
    public function index(EntityManagerInterface $entityManager): Response
    {
        //@todo it should be paginate
        $users = $entityManager
            ->getRepository(User::class)
            ->findBy([], ['id' => 'desc']);

        return $this->render(
            'admin/user/users.html.twig',
            compact('users')
        );
    }
}
