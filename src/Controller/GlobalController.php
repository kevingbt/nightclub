<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GlobalController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index(): Response
    {
        return $this->render('global/index.html.twig', [
            'controller_name' => 'GlobalController',
        ]);
    }

    #[Route("/contact", name: "contact_get", methods: ["GET"])]
    public function contact(): Response
    {
        return new Response("Formulaire");
    }

    #[Route("/contact", name: "contact_post", methods: ["POST"])]
    public function contactPost(): Response
    {
        return new Response("Formulaire envoyé");
    }

    #[Route("/apropos", name: "apropos")]
    public function apropos(): Response
    {
        return $this->render("global/apropos.html.twig");
    }

    #[Route("/article/nouveau", name: "article_nouveau")]
    public function articleNouveau(): Response
    {
        return new Response("Nouvel article créé !");
    }

    #[Route("/article/{slug}", name: "article")]
    public function article(string $slug): Response
    {
        return $this->render("global/article.html.twig", ['slug' => $slug]);
    }

}
