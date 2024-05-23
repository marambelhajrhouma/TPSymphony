<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use App\Form\ProductSearchType;
use App\Repository\ProductRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Doctrine\ORM\EntityManagerInterface;

class ProductController extends AbstractController
{
    #[Route('/admin/product/{id}', name: 'admin_product_show', requirements: ['id' => '\d+'])]
    public function show(Product $product): Response
    {
        return $this->render('admin/product/show.html.twig', [
            'product' => $product,
        ]);
    }

    #[Route('/admin/product', name: 'admin_product_list')]
    public function list(Request $request, ProductRepository $productRepository): Response
    {
        $searchForm = $this->createForm(ProductSearchType::class);
        $searchForm->handleRequest($request);

        $products = [];

        if ($searchForm->isSubmitted() && $searchForm->isValid()) {
            $criteria = $searchForm->getData();
            $products = $productRepository->findByCriteria($criteria);

            if (empty($products)) {
                $this->addFlash('error', 'No products found matching your criteria.');
            }
        } else {
            $products = $productRepository->findAll();
        }

        return $this->render('admin/product/list.html.twig', [
            'products' => $products,
            'search_form' => $searchForm->createView(),
        ]);
    }



    #[Route('/admin/product/new', name: 'admin_product_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('admin_product_show', ['id' => $product->getId()]);
        }

        return $this->render('admin/product/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin/product/edit/{id}', name: 'admin_product_edit')]
    public function edit(Request $request, Product $product, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_product_show', ['id' => $product->getId()]);
        }

        return $this->render('admin/product/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin/product/delete/{id}', name: 'admin_product_delete', methods: ['POST'])]
    public function delete(Request $request, Product $product, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$product->getId(), $request->request->get('_token'))) {
            $entityManager->remove($product);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_product_list');
    }

    #[Route('/client/products', name: 'client_product_list')]
public function clientProductList(Request $request, ProductRepository $productRepository): Response
{
    $searchForm = $this->createForm(ProductSearchType::class);
    $searchForm->handleRequest($request);

    $products = [];

    if ($searchForm->isSubmitted() && $searchForm->isValid()) {
        $criteria = $searchForm->getData();
        $products = $productRepository->findByCriteria($criteria);

        if (empty($products)) {
            $this->addFlash('error', 'No products found matching your criteria.');
        }
    } else {
        $products = $productRepository->findAll();
    }

    return $this->render('client/list.html.twig', [
        'products' => $products,
        'search_form' => $searchForm->createView(),
    ]);
}
}
