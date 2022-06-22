<?php

namespace App\Controller;

use App\Traits\AbortIf;
use App\Traits\CheckAdmin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class AdminHomeController extends AbstractController
{
    use CheckAdmin, AbortIf;

    #[Route('/admin/home', name: 'app_admin_home')]
    public function index(): Response
    {
        $this->checkIsAdmin($this->getUser());

        return $this->render('admin_home/index.html.twig', [
            'controller_name' => 'AdminHomeController',
        ]);
    }
}