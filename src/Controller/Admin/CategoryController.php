<?php

namespace App\Controller\Admin;

use App\Structure\Interfaces\CategoryServiceInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 *
 */
class CategoryController extends AbstractController
{
    #[
        Route('/admin/category/create', name: 'app_admin_category_create'),
        IsGranted('ROLE_ADMIN')
    ]
    public function index(): Response
    {
        return $this->render(
            'admin/category/add_category.html.twig',
            []
        );
    }

    #[
        Route('/admin/category/show', name: 'app_admin_category_list'),
        IsGranted('ROLE_ADMIN')
    ]
    public function show(CategoryServiceInterface $categoryService): Response
    {
        $categories = $categoryService->getAll();
        return $this->render(
            'admin/category/list_category.html.twig',
            compact('categories')
        );
    }
}
