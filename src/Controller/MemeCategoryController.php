<?php

namespace App\Controller;

use App\Entity\MemeCategory;
use App\Form\MemeCategoryType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MemeCategoryController extends AbstractController
{
    #[Route('/meme/category', name: 'app_meme_category_index')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $categories = $entityManager->getRepository(MemeCategory::class)->findAll();

        return $this->render('meme_category/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    #[Route('/meme/category/new', name: 'app_meme_category_new')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $category = new MemeCategory();
        $form = $this->createForm(MemeCategoryType::class, $category);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($category);
            $entityManager->flush();

            return $this->redirectToRoute('app_meme_category_index');
        }

        return $this->render('meme_category/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
