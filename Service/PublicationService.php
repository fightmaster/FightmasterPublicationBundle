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
use Fightmaster\PublicationBundle\Event\PublicationEvent;
use Fightmaster\PublicationBundle\Exception\PublicationException;
use Fightmaster\PublicationBundle\Model\PublicationInterface;
use Fightmaster\PublicationBundle\Events;

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
    public function save(PublicationInterface $publication)
    {
        $event = new PublicationPersistEvent($publication);
        $this->getDispatcher()->dispatch(Events::PUBLICATION_PRE_PERSIST, $event);

        if ($event->isPersistenceAborted()) {
            throw PublicationException::savingAbortedByPrePersistEvent();
        }

        $this->manager->save($publication, true);

        $event = new PublicationEvent($publication);
        $this->getDispatcher()->dispatch(Events::PUBLICATION_POST_PERSIST, $event);
    }

    /**
     * Saves publication entities
     *
     * @param $publication
     * @throws \Fightmaster\PublicationBundle\Exception\PublicationException
     */
    public function create()
    {
        $publication = $this->manager->create();
        $event = new PublicationEvent($publication);
        $this->getDispatcher()->dispatch(Events::PUBLICATION_CREATE, $event);

        return $publication;
    }

    /**
     * Returns publication
     * @param int $id
     * @return PublicationInterface
     */
    public function findPublicationById($id)
    {
        return $this->manager->find($id);
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
