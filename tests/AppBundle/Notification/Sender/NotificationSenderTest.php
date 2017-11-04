<?php

namespace Tests\AppBundle\Notification\Sender;

use AppBundle\Notification\Sender\NotificationSender;
use PHPUnit\Framework\TestCase;

/**
 * Class NotificationSenderTest
 * @package Tests\AppBundle\Notification\Sender
 */
class NotificationSenderTest extends TestCase
{
    /**
     * @test
     */
    public function it_send_email()
    {
        $mailer = $this->createMock(\Swift_Mailer::class);
        $mailer->expects($this->once())->method('send');
        $notificationSender = new NotificationSender($mailer, 'test@test.com');
        $notificationSender->send('test', 'test@test.com', 'test');
    }
}