<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/', name: 'app_hello')]
    public function Hello(): Response
    {
        return new Response('<h1>Bonjour Daouda </h1>');
    }
    #[Route('/blog', name: 'app_blog')]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
    // routes dynamiques de sf6 :
    #[Route('/blog/{id}/{nom}', name: 'app_blog',
     requirements: ["nom" => "[a-z]{5, 50}"])] 
    public function dynamiques($id,  $nom): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'dynamique'=> $id . ' '. $nom
        ]);
    }
}
