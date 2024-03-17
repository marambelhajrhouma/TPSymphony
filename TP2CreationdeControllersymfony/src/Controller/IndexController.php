<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/blog', name: 'home' )]
    #[Route('/{name}', name: 'hello')]
    public function home($name = null)
    {
        return $this->render('index.html.twig',['name' => $name]);
    }
}
