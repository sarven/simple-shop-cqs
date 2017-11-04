<?php

namespace AppBundle\Product\Event;

use AppBundle\Entity\Product\Product;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class ProductCreatedEvent
 * @package AppBundle\Product\Event
 */
class ProductCreatedEvent extends Event
{
    const NAME = 'product.created';

    /**
     * @var Product
     */
    protected $product;

    /**
     * ProductCreatedEvent constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }
}