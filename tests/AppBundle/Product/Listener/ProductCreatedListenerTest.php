<?php

namespace Tests\AppBundle\Product\Listener;

use AppBundle\Notification\Sender\NotificationSenderInterface;
use AppBundle\Product\Listener\ProductCreatedListener;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use AppBundle\Product\Event\ProductCreatedEvent;

/**
 * Class ProductCreatedListenerTest
 * @package Tests\AppBundle\Product\Listener
 */
class ProductCreatedListenerTest extends TestCase
{
    /**
     * @test
     */
    public function it_send_notification()
    {
        $productCreatedEvent = $this->createMock(ProductCreatedEvent::class);
        $notificationSender = $this->createMock(NotificationSenderInterface::class);

        $notificationSender
            ->expects($this->once())
            ->method('send');

        $productCreatedListener = new ProductCreatedListener($notificationSender, 'test@test.com');
        $productCreatedListener->onProductCreatedAction($productCreatedEvent);
    }
}

