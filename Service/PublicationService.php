<?php

/**
 * This file is part of the FightmasterPublicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */


namespace Fightmaster\PublicationBundle\Service;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Fightmaster\Model\Manager\ManagerInterface;
use Fightmaster\PublicationBundle\Event\PublicationPersistEvent;
use Fightmaster\PublicationBundle\Exception\PublicationException;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class PublicationService
{
    /**
     * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface
     */
    protected $dispatcher;

    /**
     * @var \Fightmaster\Model\Manager\ManagerInterface
     */
    protected $manager;

    public function __construct(EventDispatcherInterface $eventDispatcher, ManagerInterface $manager)
    {
        $this->dispatcher = $eventDispatcher;
        $this->manager = $manager;
    }

    /**
     * Saves publication entities
     *
     * @param $publication
     * @throws \Fightmaster\PublicationBundle\Exception\PublicationException
     */
    public function save($publication)
    {
        $event = new PublicationPersistEvent($publication);
        $this->getDispatcher()->dispatch(Events::PUBCLICATION_PRE_PERSIST, $event);

        if ($event->isPersistenceAborted()) {
            throw PublicationException::savingAbortedByPrePersistEvent();
        }

        $this->manager->save($publication, true);

        $event = new PublicationEvent($publication);
        $this->getDispatcher()->dispatch(Events::PUBLICATION_POST_PERSIST, $event);
    }

    /**
     * Returns EventDispatcher
     *
     * @return \Symfony\Component\EventDispatcher\EventDispatcherInterface
     */
    protected function getDispatcher()
    {
        return $this->dispatcher;
    }
}
