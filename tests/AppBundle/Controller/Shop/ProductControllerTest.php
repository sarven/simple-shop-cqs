<?php

namespace Tests\AppBundle\Shop\Controller;

use Tests\AppBundle\Controller\WebTestCaseAbstract;

/**
 * Class ProductControllerTest
 * @package Tests\AppBundle\Shop\Controller
 */
class ProductControllerTest extends WebTestCaseAbstract
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