<?php

namespace Tests\AppBundle\Product\Query;

use AppBundle\Product\Query\DoctrineProducts;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class DoctrineProductsTest
 * @package Tests\AppBundle\Product\Query
 */
class DoctrineProductsTest extends KernelTestCase
{
    /**
     * @var DoctrineProducts
     */
    private $doctrineProducts;

    public function setUp()
    {
        self::bootKernel();
        $this->doctrineProducts = static::$kernel->getContainer()->get('query.doctrine_products');
    }

    /**
     * @test
     */
    public function it_returns_pagination()
    {
        $pagination = $this->doctrineProducts->getPaginated(1);
        $this->assertInstanceOf(PaginationInterface::class, $pagination);
    }
}
