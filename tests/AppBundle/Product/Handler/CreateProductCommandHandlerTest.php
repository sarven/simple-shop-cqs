<?php

namespace Tests\AppBundle\Product\Handler;

use AppBundle\Product\Command\CreateProductCommand;
use AppBundle\Product\Exception\InvalidProductException;
use AppBundle\Product\Handler\CreateProductCommandHandler;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use AppBundle\Product\Event\ProductCreatedEvent;

/**
 * Class CreateProductCommandHandlerTest
 * @package Tests\AppBundle\Product\Handler
 */
class CreateProductCommandHandlerTest extends KernelTestCase
{
    /**
     * @var ValidatorInterface
     */
    private $validator;

    public function setUp()
    {
        self::bootKernel();
        $this->validator = static::$kernel->getContainer()->get('validator');
    }

    /**
     * @test
     */
    public function it_throws_exception()
    {
        $handler = new CreateProductCommandHandler(
            $this->createMock(EntityManagerInterface::class),
            $this->validator,
            $this->createMock(EventDispatcherInterface::class)
        );
        $createProductCommand = new CreateProductCommand();
        $createProductCommand->name = 'test';
        $createProductCommand->description = 'test';
        $createProductCommand->price = 1.99;
        $this->expectException(InvalidProductException::class);
        $handler->handle($createProductCommand);
    }

    /**
     * @test
     */
    public function it_create_product()
    {
        $createProductCommand = new CreateProductCommand();
        $createProductCommand->name = 'test';
        $createProductCommand->description = 'test test test test test test test test test test test test test test test test test test test test test test';
        $createProductCommand->price = 1.99;

        $entityManager = $this->createMock(EntityManagerInterface::class);
        $entityManager->expects($this->once())->method('persist');
        $entityManager->expects($this->once())->method('flush');
        $eventDispatcher = $this->createMock(EventDispatcherInterface::class);
        $eventDispatcher->expects($this->once())
            ->method('dispatch')
            ->with(ProductCreatedEvent::NAME, $this->isInstanceOf(ProductCreatedEvent::class));

        $handler = new CreateProductCommandHandler(
            $entityManager,
            $this->validator,
            $eventDispatcher
        );
        $handler->handle($createProductCommand);
    }
}