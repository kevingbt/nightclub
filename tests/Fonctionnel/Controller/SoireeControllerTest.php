<?php

namespace App\Tests\Fonctionnel\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SoireeControllerTest extends WebTestCase
{
    public function testPageAccueil(): void
    {
        $client = static::createClient();
        $client->request('GET', '/');

        self::assertResponseIsSuccessful();
    }
}