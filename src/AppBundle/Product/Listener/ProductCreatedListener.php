<?php

namespace AppBundle\Product\Listener;

use AppBundle\Notification\Sender\NotificationSenderInterface;
use AppBundle\Product\Event\ProductCreatedEvent;

/**
 * Class ProductCreatedListener
 * @package AppBundle\Product\Listener
 */
final class ProductCreatedListener
{
    /**
     * @var NotificationSenderInterface
     */
    private $notificationSender;

    /**
     * @var string
     */
    private $recipientAddress;

    /**
     * ProductCreatedListener constructor.
     * @param NotificationSenderInterface $notificationSender
     * @param string $recipientAddress
     */
    public function __construct(
        NotificationSenderInterface $notificationSender,
        string $recipientAddress
    )
    {
        $this->notificationSender = $notificationSender;
        $this->recipientAddress = $recipientAddress;
    }

    /**
     * @param ProductCreatedEvent $event
     */
    public function onProductCreatedAction(ProductCreatedEvent $event): void
    {
        $product = $event->getProduct();
        $this->notificationSender->send('New product has been created', $this->recipientAddress, 'Name: '.$product->getName());
    }
}