<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * Class Product
 * @package AppBundle\Entity
 *
 * @ORM\Entity()
 * @ORM\Table(name="product")
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(type="string")
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(type="decimal", scale=2)
     */
    private $price;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * Product constructor.
     * @param string $title
     * @param string $description
     * @param float $price
     */
    public function __construct(
        string $title,
        string $description,
        float $price
    )
    {
        $this->id = Uuid::uuid4();
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
    }
}

