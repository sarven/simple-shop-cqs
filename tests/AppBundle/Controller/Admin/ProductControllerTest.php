<?php

namespace Tests\AppBundle\Controller\Admin;

use AppBundle\Repository\Product\ProductRepository;
use Tests\AppBundle\Controller\WebTestCaseAbstract;

/**
 * Class ProductControllerTest
 * @package Tests\AppBundle\Controller\Admin
 */
class ProductControllerTest extends WebTestCaseAbstract
{
    const PRODUCT_DATA = [
        'name' => 'test',
        'description' => 'test test test test test test test test test test test test test test test test test test test test test test test test test',
        'price' => 199.02
    ];

    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function setUp()
    {
        self::bootKernel();
        $this->productRepository = static::$kernel->getContainer()->get('repository.product');
    }

    /**
     * @test
     */
    public function it_create_product()
    {
        $initCount = count($this->productRepository->findAll());
        $client = $this->getAuthenticatedClient();
        $crawler = $client->request('GET', '/admin/new-product');
        $form = $crawler->filter('form')->form([
            'create_product' => self::PRODUCT_DATA
        ]);
        $client->submit($form);
        $client->followRedirect();
        $finalCount = count($this->productRepository->findAll());
        $this->assertEquals('/', $client->getRequest()->getRequestUri());
        $this->assertGreaterThan($initCount, $finalCount);
    }

    /**
     * @test
     */
    public function it_redirect_to_login_form()
    {
        $client = self::createClient();
        $client->request('GET', '/admin/new-product');
        $client->followRedirect();
        $this->assertEquals('/login', $client->getRequest()->getRequestUri());
    }
}