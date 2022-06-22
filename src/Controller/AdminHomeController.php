<?php

namespace App\Controller;

use App\Traits\AbortIf;
use App\Traits\CheckAdmin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 *
 */
class AdminHomeController extends AbstractController
{
    use CheckAdmin, AbortIf;

    /**
     * @return Response
     */
    #[Route('/admin/', name: 'app_admin_home')]
    public function index(): Response
    {
        //@todo this line should be uncommented later
//        $this->checkIsAdmin($this->getUser());

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminHomeController',
        ]);
    }
}