<?php
/**
 * Created by PhpStorm.
 * User: Florian
 * Date: 05/02/18
 * Time: 10:00
 */

namespace AppBundle\EventListener;

use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class RegistrationListener implements EventSubscriberInterface
{
    /**
     * @var \Symfony\Component\Routing\Generator\UrlGeneratorInterface
     */
    private $router;

    /**
     * @var \Symfony\Component\HttpFoundation\Session\Session
     */
    private $session;

    /**
     * RegistrationListener constructor.
     *
     * @param \Symfony\Component\Routing\Generator\UrlGeneratorInterface $router
     * @param \Symfony\Component\HttpFoundation\Session\SessionInterface $session
     */
    public function __construct(UrlGeneratorInterface $router, SessionInterface $session)
    {
        $this->router = $router;
        $this->session = $session;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationComplete',
        );
    }

    /**
     * Custom registration after completed registration and set message confirmation in session
     */
    public function onRegistrationComplete(FormEvent $event){
        $url = $this->router->generate('homepage');

        $event->setResponse(new RedirectResponse($url));

        $event->stopPropagation();
    }
}