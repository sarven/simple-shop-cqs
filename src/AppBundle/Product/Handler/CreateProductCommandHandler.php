<?php

namespace AppBundle\Product\Handler;

use AppBundle\Entity\Product\Product;
use AppBundle\Product\Command\CreateProductCommand;
use AppBundle\Product\Exception\InvalidProductException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class CreateProductCommandHandler
 * @package AppBundle\Product\Handler
 */
final class CreateProductCommandHandler
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * CreateProductCommandHandler constructor.
     * @param EntityManagerInterface $entityManager
     * @param ValidatorInterface $validator
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        ValidatorInterface $validator
    )
    {
        $this->entityManager = $entityManager;
        $this->validator = $validator;
    }

    /**
     * @param CreateProductCommand $createProductCommand
     * @throws InvalidProductException
     */
    public function handle(CreateProductCommand $createProductCommand): void
    {
        $errors = $this->validator->validate($createProductCommand);

        if ($errors->count()) {
            throw new InvalidProductException('Invalid product');
        }

        $product = Product::fromCreateProductCommand($createProductCommand);

        $this->entityManager->persist($product);
        $this->entityManager->flush();
    }
}