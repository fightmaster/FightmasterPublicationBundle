<?php

namespace SarSport\PublicationBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\EventDispatcher\EventDispatcher;
use SarSport\PublicationBundle\Event\PublicationEvent;
use SarSport\PublicationBundle\Event\PublicationPersistEvent;
use SarSport\PublicationBundle\Events;

/**
 * Abstract Publication Manager implementation which can be used as base class for your
 * concrete manager.
 *
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
abstract class PublicationManager implements PublicationManagerInterface
{
    /**
     * @var \Symfony\Component\EventDispatcher\EventDispatcher
     */
    protected $dispatcher;

    /**
     * @var \Doctrine\Common\Persistence\ObjectManager
     */
    protected $objectManager;

    /**
     * @var string
     */
    protected $class;

    public function __construct(EventDispatcher $eventDispatcher, ObjectManager $objectManager, $class)
    {
        $this->dispatcher = $eventDispatcher;
        $this->objectManager = $objectManager;
        $this->class = $this->objectManager->getClassMetadata($class)->getName();
    }

    /**
     * Returns the publication fully qualified class name.
     *
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Creates an empty publication instance.
     *
     * @return Publication
     */
    public function createPublication()
    {
        $class = $this->getClass();
        $publication = new $class;

        $event = new PublicationEvent($publication);
        $this->getDispatcher()->dispatch(Events::PUBLICATION_CREATE, $event);

        return $publication;
    }

    /**
     * Adds a publication.
     *
     * @param PublicationInterface $publication
     */
    public function savePublication(PublicationInterface $publication)
    {
        $event = new PublicationPersistEvent($publication);
        $this->getDispatcher()->dispatch(Events::PUBCLICATION_PRE_PERSIST, $event);

        if ($event->isPersistenceAborted()) {
            return;
        }

        $this->doSavePublication($publication);

        $event = new PublicationEvent($publication);
        $this->getDispatcher()->dispatch(Events::PUBLICATION_POST_PERSIST, $event);
    }

    /**
     * @return \Symfony\Component\EventDispatcher\EventDispatcher
     */
    protected function getDispatcher()
    {
        return $this->dispatcher;
    }

    /**
     * The method returns \Doctrine\Common\Persistence\ObjectManager
     * @return \Doctrine\Common\Persistence\ObjectManager
     */
    protected function getManager()
    {
        return $this->objectManager;
    }

    /**
     * Performs the persistence of a publication.
     *
     * @param PublicationInterface $publication
     */
    protected function doSavePublication(PublicationInterface $publication)
    {
        $this->getManager()->persist($publication);
        $this->getManager()->flush();;
    }
}
