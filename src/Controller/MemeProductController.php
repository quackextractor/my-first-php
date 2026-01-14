<?php

namespace App\Controller;

use App\Entity\MemeProduct;
use App\Form\MemeProductType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MemeProductController extends AbstractController
{
    #[Route('/meme/product', name: 'app_meme_product_index')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $products = $entityManager->getRepository(MemeProduct::class)->findAll();

        return $this->render('meme_product/index.html.twig', [
            'products' => $products,
        ]);
    }

    #[Route('/meme/product/new', name: 'app_meme_product_new')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $product = new MemeProduct();
        $form = $this->createForm(MemeProductType::class, $product);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('app_meme_product_index');
        }

        return $this->render('meme_product/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
