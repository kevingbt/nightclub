<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GlobalController extends AbstractController
{

    #[Route('/', name: 'accueil')]
    public function index(): Response
    {
        return $this->render('global/index.html.twig', [
            'title' => 'Titre de la page d\'accueil',
        ]);
    }

    #[Route("/contact", name: "contact", methods: ["GET"])]
    public function contact(): Response
    {
        return $this->render("global/contact.html.twig");
    }

    #[Route("/contact", name: "contact_post", methods: ["POST"])]
    public function contactPost(): Response
    {
        return new Response("Formulaire envoyé");
    }

    #[Route("/apropos", name: "apropos")]
    public function apropos(): Response
    {
        $historique = [
            ["année" => 2020, "texte" => "Construction de la discothèque"],
            ["année" => 2021, "texte" => "Ouverture de la discothèque"],
            ["année" => 2022, "texte" => "Nouvelle extension"],
        ];

        return $this->render("global/apropos.html.twig", ['historiques' => $historique]);
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

    #[Route("/bonjour", name: "bonjour", methods: ["GET"])]
    public function bonjour(Request $request): Response
    {
        if ($request->query->get('prenom')) {
            return new Response("Bonjour {$request->query->get('prenom')} ");
        } else {
            return new Response("Bonjour invité");
        }
    }

    #[Route("/json/etapes", name: "json_etapes")]
    public function json_etapes(): JsonResponse
    {
        $etapes = [["id" => 1, "année" => 2020, "texte" => "Étape 1"], ["id" => 2, "année" => 2021, "texte" => "Étape 2"], ["id" => 3, "année" => 2022, "texte" => "Étape 3"]];
        return $this->json($etapes);
    }
}
