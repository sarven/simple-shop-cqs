<?php

namespace AppBundle\Product\Command;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class CreateProductCommand
 * @package AppBundle\Product\Command
 */
final class CreateProductCommand
{
    /**
     * @var string
     *
     * @Assert\NotBlank()
     */
    public $name;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min="100")
     */
    public $description;

    /**
     * @var float
     */
    public $price;
}