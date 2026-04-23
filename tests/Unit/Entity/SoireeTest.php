<?php 

namespace App\Tests\Unit\Entity;

use App\Entity\Soiree;
use App\Entity\Artiste;
use PHPUnit\Framework\TestCase;
class SoireeTest extends TestCase
{
    public function testSetAndGetTitre(): void
    {
        $soiree = new Soiree();
        $soiree->setTitre("Soirée Mousse");
        self::assertSame("Soirée Mousse", $soiree->getTitre());
    }

    public function testAddArtiste(): void
    {
        $soiree = new Soiree();
        $artiste = new Artiste();
        $soiree->addSoireeArtiste($artiste);
        self::assertCount(1, $soiree->getSoireeArtiste());
    }
}