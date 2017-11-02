<?php

namespace tests\AppBundle\Shop\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class ProductControllerTest
 * @package tests\AppBundle\Shop\Controller
 */
class ProductControllerTest extends WebTestCase
{
    /**
     * @test
     */
    public function it_shows_list_of_products()
    {
        $client = self::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertGreaterThan(1, $crawler->filter('.products tr')->count());
    }
}