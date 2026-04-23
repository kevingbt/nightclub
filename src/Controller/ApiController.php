<?php

namespace App\Controller;

use App\Repository\MaterielRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

final class ApiController extends AbstractController
{
    #[Route('/api/materiel', name: 'app_api')]
    public function apiMateriel(MaterielRepository $materielRepository, SerializerInterface $serializer): Response
    {
        $materiels = $materielRepository->findAll();
        // $json = $serializer->serialize($materiels, 'json');
        return $this->json($materiels, 200, [], ['groups' => 'titre']);
    }
}
