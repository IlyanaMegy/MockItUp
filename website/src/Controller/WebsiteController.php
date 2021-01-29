<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WebsiteController extends AbstractController
{
    /**
     * @Route("/", name="website_home")
     */
    public function index(PostRepository $postrepo): Response
    {  
        $posts = $postrepo->findAll();
        return $this->render('website/home.html.twig', compact('posts'));
    }

    /**
     * @Route("/posts/{id<\d+>}", name="website_post_show")
     */
    #l'id est un nombre décimal
    
    public function show(Post $post): Response
    {  
        dd($post);
    }
}