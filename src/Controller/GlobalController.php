<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GlobalController extends AbstractController
{
    #[Route('/', name: 'app_global')]
    public function index(): Response
    {
        return $this->render('global/index.html.twig', [
            'controller_name' => 'GlobalController',
        ]);
    }

    #[Route("/contact", name: "contact")]
    public function contact(): Response{
        return $this->render("global/contact.html.twig");
    }

    #[Route("/apropos", name: "apropos")]
    public function apropos(): Response{
        return $this->render("global/apropos.html.twig");
    }
}
