<?php

namespace tests\AppBundle\Product\Handler;

use AppBundle\Product\Command\CreateProductCommand;
use AppBundle\Product\Exception\InvalidProductException;
use AppBundle\Product\Handler\CreateProductCommandHandler;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class CreateProductCommandHandlerTest
 * @package tests\AppBundle\Product\Handler
 */
class CreateProductCommandHandlerTest extends KernelTestCase
{
    /**
     * @var CreateProductCommandHandler
     */
    private $handler;

    public function setUp()
    {
        self::bootKernel();
        $validator = static::$kernel->getContainer()->get('validator');
        $this->handler = new CreateProductCommandHandler(
            $this->createMock(EntityManagerInterface::class),
            $validator
        );
    }

    /**
     * @test
     */
    public function it_throws_exception()
    {
        $createProductCommand = new CreateProductCommand();
        $createProductCommand->name = 'test';
        $createProductCommand->description = 'test';
        $createProductCommand->price = 1.99;
        $this->expectException(InvalidProductException::class);
        $this->handler->handle($createProductCommand);
    }
}