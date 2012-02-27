<?php


namespace Fightmaster\PublicationBundle\Service;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Fightmaster\Model\Manager\ManagerInterface;
use Fightmaster\Service\Service;
use Fightmaster\PublicationBundle\Event\PublicationPersistEvent;
use Fightmaster\PublicationBundle\Exception\PublicationException;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class PublicationService extends Service
{
    /**
     * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface
     */
    protected $dispatcher;

    public function __construct(EventDispatcherInterface $eventDispatcher, ManagerInterface $manager)
    {
        parent::__construct($manager);
        $this->dispatcher = $eventDispatcher;
    }

    /**
     * {@inheritdoc}
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

        parent::save($publication);

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
