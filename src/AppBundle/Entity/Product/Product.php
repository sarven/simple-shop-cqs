<?php

namespace AppBundle\Entity\Product;

use AppBundle\Product\Command\CreateProductCommand;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * Class Product
 * @package AppBundle\Entity\Product
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Product\ProductRepository")
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
    private $name;

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
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

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
    public function getName(): string
    {
        return $this->name;
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
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * Product constructor.
     * @param string $name
     * @param string $description
     * @param float $price
     */
    public function __construct(
        string $name,
        string $description,
        float $price
    )
    {
        $this->id = Uuid::uuid4();
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->createdAt = new \DateTime();
    }

    /**
     * @param CreateProductCommand $createProductCommand
     * @return Product
     */
    public static function fromCreateProductCommand(CreateProductCommand $createProductCommand): Product
    {
        return new self(
            $createProductCommand->name,
            $createProductCommand->description,
            $createProductCommand->price
        );
    }
}

