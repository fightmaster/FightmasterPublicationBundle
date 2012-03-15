<?php

/**
 * This file is part of the FightmasterPublicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Fightmaster\PublicationBundle\EventListener;

use Fightmaster\PublicationBundle\Events;
use Fightmaster\PublicationBundle\Event\PublicationEvent;
use Fightmaster\PublicationBundle\Model\PublicationInterface;
use Fightmaster\PublicationBundle\Model\SignedPublicationInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Log\LoggerInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;

/**
 * Blames a comment using Symfony2 security component
 *
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class PublicationBlamerListener implements EventSubscriberInterface
{
    /**
     * @var SecurityContext
     */
    protected $securityContext;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * Constructor.
     *
     * @param SecurityContextInterface $securityContext
     * @param LoggerInterface $logger
     */
    public function __construct(SecurityContextInterface $securityContext, LoggerInterface $logger = null)
    {
        $this->securityContext = $securityContext;
        $this->logger = $logger;
    }

    /**
     * Assigns the currently logged in user to a Comment.
     *
     * @param \Fightmaster\PublicationBundle\Event\PublicationEvent $event
     * @return void
     */
    public function blame(PublicationEvent $event)
    {
        $publication= $event->getPublication();

        if (!$publication instanceof SignedPublicationInterface) {
            if ($this->logger) {
                $this->logger->debug("Publication does not implement SignedPublicationInterface, skipping");
            }

            return;
        }

        if (null === $this->securityContext->getToken()) {
            if ($this->logger) {
                $this->logger->debug("There is no firewall configured. We cant get a user.");
            }

            return;
        }

        if ($this->securityContext->isGranted('IS_AUTHENTICATED_FULLY')) {
            $publication->setAuthor($this->securityContext->getToken()->getUser());
        }
    }

    static public function getSubscribedEvents()
    {
        return array(Events::PUBLICATION_PRE_PERSIST => 'blame');
    }
}
