<?php


namespace Fightmaster\PublicationBundle\Service;

use Fightmaster\Service\Service;
use Fightmaster\PublicationBundle\Event\PublicationPersistEvent;
use Fightmaster\PublicationBundle\Exception\PublicationException;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class PublicationService extends Service
{
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
}
