<?php

namespace App\Controller;

use App\Entity\Article;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use App\Form\ArticleType;

class IndexController extends AbstractController
{
    
    private $logger;
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager, LoggerInterface $logger)
    {
        $this->entityManager = $entityManager;
        $this->logger = $logger;
    }
    /** * @Route("/article/save")*/
#[Route('/article/save', name: 'home')]
    public function save()
    {
        $article = new Article();
        $article->setNom('Article 3');
        $article->setPrix(4000);
        $this->entityManager->persist($article);
        $this->entityManager->flush();
        return new Response('Article enregistré avec id ' . $article->getId());
    }

    /**
 *@Route("/",name="article_list")
 */
#[Route('/', name: 'article_list')]

public function home()
{
// Récupérer tous les articles de la table Article de la BD
// et les mettre dans le tableau $articles
    $articles = $this->entityManager->getRepository(Article::class)->findAll();

    return $this->render('articles/index.html.twig', ['articles' => $articles]);
}
/**
 * @Route("/article/new", name="new_article")
 * @Method({"GET", "POST"})
 */
#[Route('/article/new', name: 'new_article')]
public function new(Request $request, EntityManagerInterface $entityManager): Response
{
    $article = new Article();
    $form = $this->createForm(ArticleType::class, $article);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $article = $form->getData();
        $entityManager->persist($article);
        $entityManager->flush();
        return $this->redirectToRoute('article_list');
    }

    // Gestion des erreurs
    if ($form->isSubmitted() && !$form->isValid()) {
        $errors = $form->getErrors(true, false);
        // Faites quelque chose avec les erreurs, comme les afficher ou les loguer
        // Par exemple, loguer les erreurs
        foreach ($errors as $error) {
            $this->logger->error($error->getMessage());
        }
    }

    return $this->render('articles/new.html.twig', ['form' => $form->createView()]);
}

/**
 * @Route("/article/{id}", name="article_show")
 */
#[Route('/article/{id}', name: 'article_show')]

public function show($id) {
    $article = $this->entityManager->getRepository(Article::class)->find($id);

    return $this->render('articles/show.html.twig', ['article' => $article]);
}

    /**
 * @Route("/article/edit/{id}", name="edit_article")
 * Method({"GET", "POST"})
 */
#[Route('/article/edit/{id}', name: 'edit_article')]
public function edit(Request $request, $id) {
    $entityManager = $this->entityManager;
    
    $article = $entityManager->getRepository(Article::class)->find($id);
    
    $form = $this->createForm(ArticleType::class, $article);
    
    $form->handleRequest($request);
    
    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->flush();
    
        return $this->redirectToRoute('article_list');
    }
    
    return $this->render('articles/edit.html.twig', ['form' => $form->createView()]);
}
 

/**
 * @Route("/article/delete/{id}", name="delete_article")
 * @Method({"DELETE"})
 */

 #[Route('/article/delete/{id}', name: 'delete_article')]

public function delete(Request $request, $id, EntityManagerInterface $entityManager)
{
    $article = $entityManager->getRepository(Article::class)->find($id);
    $entityManager->remove($article);
    $entityManager->flush();

    return $this->redirectToRoute('article_list');
}


}
