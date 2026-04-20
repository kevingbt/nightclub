<?php

namespace App\DataFixtures;

use App\Entity\Soiree;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Factory\SoireeFactory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $soiree = new Soiree();
        // $soiree->setTitre('Soirée Electro');
        // $soiree->setDateSoiree(new \DateTimeImmutable('2024-07-15 22:00:00'));
        // $soiree->setDateCreation(new \DateTimeImmutable());
        // $soiree->setStatut('ouverte');
        // $manager->persist($soiree);
        // $manager->flush();

        SoireeFactory::createMany(5);
    }
}
