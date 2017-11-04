<?php

namespace AppBundle\Notification\Sender;

/**
 * Class NotificationSender
 * @package AppBundle\Notification\Sender
 */
final class NotificationSender implements NotificationSenderInterface
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var string
     */
    private $from;

    /**
     * NotificationSender constructor.
     * @param \Swift_Mailer $mailer
     * @param string $from
     */
    public function __construct(\Swift_Mailer $mailer, string $from)
    {
        $this->mailer = $mailer;
        $this->from = $from;
    }

    /**
     * {@inheritdoc}
     */
    public function send(string $subject, string $to, string $body): void
    {
        $message = (new \Swift_Message($subject))
            ->setFrom($this->from)
            ->setTo($to)
            ->setBody($body);

        $this->mailer->send($message);
    }
}