<?php

namespace App\Controller\Admin;

use App\Entity\VehicleCategory;
use App\Form\CategoryFormType;
use App\Structure\Interfaces\CategoryServiceInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $vehicleCategory = new VehicleCategory();
        $form = $this->createForm(CategoryFormType::class, $vehicleCategory);
        $this->handleForm($form, $request, $entityManager, $vehicleCategory);

        return $this->render(
            'admin/category/add_category.html.twig',
            [
                'vehicle_category' => $vehicleCategory,
                'form' => $form->createView()
            ]
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

    /**
     * @param FormInterface $form
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param VehicleCategory $vehicleCategory
     * @return VehicleCategory|null
     */
    public function handleForm(FormInterface $form, Request $request, EntityManagerInterface $entityManager, VehicleCategory $vehicleCategory): VehicleCategory|null
    {
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $entityManager->persist($vehicleCategory);
            $entityManager->flush();
        }
        return $vehicleCategory;
    }
}
