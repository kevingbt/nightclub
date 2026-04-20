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

        SoireeFactory::createMany(5);
    }
}
