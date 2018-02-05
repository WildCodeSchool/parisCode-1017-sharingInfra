<?php

namespace AppBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class SendMail
 *
 * @package AppBundle\Services
 */
class SendMail
{
    /*
     *
     */
    private $container;

    /**
     * @var string
     */
    private $mailerUser;

    /**
     * SendMail constructor.
     *
     * @param string                                                    $mailerUser
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    public function __construct(string $mailerUser, ContainerInterface $container)
    {
        $this->container = $container;
        $this->mailerUser = $mailerUser;
    }

    /**
     * @param string $subject
     * @param string $to
     * @param string $view
     * @param array  $params
     */
    public function sendMail(string $subject, string $to, string $view, array $params){
        $message = (new \Swift_Message($subject))
            ->setFrom($this->mailerUser)
            ->setTo($to)
            ->setBody($this->container->get('templating')->render($view, $params), 'text/html')
        ;

        $this->container->get('mailer')->send($message);
    }
}