<?php

namespace App\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 *
 */
class AdminHomeController extends AbstractController
{
    /**
     * @return Response
     */
    #[
        Route('/admin/', name: 'app_admin_home'),
        IsGranted('ROLE_ADMIN')
    ]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminHomeController',
        ]);
    }
}
