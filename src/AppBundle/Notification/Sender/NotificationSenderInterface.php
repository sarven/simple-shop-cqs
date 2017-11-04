<?php

namespace AppBundle\Notification\Sender;

/**
 * Interface NotificationSenderInterface
 * @package AppBundle\Notification\Sender
 */
interface NotificationSenderInterface
{
    /**
     * @param string $subject
     * @param string $to
     * @param string $body
     */
    public function send(string $subject, string $to, string $body): void;
}