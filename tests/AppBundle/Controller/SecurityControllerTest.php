<?php

namespace tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    /**
     * @test
     */
    public function it_log_in_as_user()
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
    }

    /**
     * @test
     */
    public function it_log_in_as_admin()
    {
        $client = self::createClient();
        $crawler = $client->request('GET', '/login');
        $form = $crawler->filter('form')->form([
            '_username' => 'admin',
            '_password' => 'admin'
        ]);
        $client->submit($form);
        $client->followRedirect();

        $this->assertEquals('/', $client->getRequest()->getRequestUri());
    }

    /**
     * @test
     */
    public function it_does_not_log_in_as_user()
    {
        $client = self::createClient();
        $crawler = $client->request('GET', '/login');
        $form = $crawler->filter('form')->form([
            '_username' => 'user',
            '_password' => 'user123'
        ]);
        $client->submit($form);
        $client->followRedirect();

        $this->assertEquals('/login', $client->getRequest()->getRequestUri());
    }
}