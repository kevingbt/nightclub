<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Soiree;
use App\Repository\SoireeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SoireeController extends AbstractController
{
    #[Route('/soiree', name: 'app_soiree')]
    public function index(): Response
    {
        return $this->render('soiree/index.html.twig', [
            'controller_name' => 'SoireeController',
        ]);
    }

    #[Route('/soiree/creer', name: 'creer_soiree')]
    function creer_soiree(EntityManagerInterface $em): Response
    {
        $soiree = new Soiree();
        $soiree->setTitre('Soirée de folie');
        $soiree->setDateSoiree(new \DateTimeImmutable);
        $soiree->setDateCreation(new \DateTimeImmutable);

        $em->persist($soiree);
        $em->flush();

        return new Response('Soirée créée avec succès !');
    }

    #[Route('/soirees', name: 'soirees')]
    function soirees(SoireeRepository $soireeRepository): Response
    {
        $soirees = $soireeRepository->findAll();
        dd($soirees);
    }

    #[Route('/soiree/{id}/read', name: 'read_soiree')]
    function soirreId($id, SoireeRepository $soireeRepository): Response
    {
        $soiree = $soireeRepository->find($id);
        dd($soiree);
    }

    #[Route('/soiree/{id}/update', name: 'update_soiree')]
    function update_soiree($id, EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Soiree::class);
        $soiree = $repository->find($id);
        $soiree->setTitre("Soirée mousse");
        $em->flush();
        dd($soiree);
    }

    #[Route('/soiree/{id}/delete', name: 'delete_soiree')]
    function delete_soiree($id, EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Soiree::class);
        $soiree = $repository->find($id);
        $em->remove($soiree);
        $em->flush();
        return $this->redirectToRoute('soirees');
    }
}
