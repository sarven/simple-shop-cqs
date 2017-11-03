<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Client;

/**
 * Class WebTestCaseAbstract
 * @package Tests\AppBundle\Controller
 */
abstract class WebTestCaseAbstract extends WebTestCase
{
    /**
     * @return Client
     */
    protected function getAuthenticatedClient(): Client
    {
        $client = self::createClient();
        $crawler = $client->request('GET', '/login');
        $form = $crawler->filter('form')->form([
            '_username' => 'user',
            '_password' => 'user'
        ]);
        $client->submit($form);
        $client->followRedirect();
        $this->assertEquals('/', $client->getRequest()->getRequestUri());

        return $client;
    }
}