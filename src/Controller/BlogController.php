<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/', name: 'app_hello')]
    public function Hello(UsersRepository $usersRepository): Response
    {
        $users = $usersRepository->findAll(); 

        // return new Response('<h1>Bonjour Daouda </h1>');

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'users'=>$users,
        ]);
    }
    #[Route('/blog', name: 'app_blog')]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
  
        #[Route('/blog/{id}/{nom}', name: 'app_blog')] 
    public function dynamiques($id,  $nom): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'dynamique'=> $id . ' '. $nom
        ]);
    }
}
