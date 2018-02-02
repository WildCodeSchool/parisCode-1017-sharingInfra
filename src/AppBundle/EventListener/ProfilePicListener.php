<?php

namespace AppBundle\EventListener;

use AppBundle\Services\FileUploader;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Listener responsible to upload the profile pic at the end of the profile editing
 */
class ProfilePicListener implements EventSubscriberInterface
{
    private $router;
    private $uploader;

    public function __construct(UrlGeneratorInterface $router, FileUploader $uploader)
    {
        $this->router = $router;
        $this->uploader = $uploader;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::PROFILE_EDIT_SUCCESS => 'onEditSuccess',
        );
    }

    /**
     * Upload user profile pic on edit success
     *
     * @param FormEvent $event
     */
    public function onEditSuccess(FormEvent $event)
    {
        // fonction d'upload de la photo

        $user = $event->getForm()->getViewData();

        $this->uploader->upload($user->getPicture());

        $event->stopPropagation();
    }
}