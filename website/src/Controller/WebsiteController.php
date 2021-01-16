<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WebsiteController extends AbstractController
{
    /**
     * @Route("/welcome", name="welcome_MockItUp", methods={"GET"})
     */
    // public function index(PostRepository $postRepo)
    //{
        // $posts = $postRepo->findAll();

        // dd($posts);
    public function index()
    {  
        return $this->render('website/index.html.twig', [
            'controller_name' => 'WebsiteController',
        ]);
    }
}
