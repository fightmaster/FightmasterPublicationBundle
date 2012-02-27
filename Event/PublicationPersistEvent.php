<?php

namespace Fightmaster\PublicationBundle\Event;

use Fightmaster\PublicationBundle\Model\PublicationInterface;

/**
 * An event related to a persisting event that can be
 * cancelled by a listener.
 *
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class PublicationPersistEvent extends PublicationEvent implements PersistEventInterface
{
    /**
     * @var bool
     */
    private $abortPersistence = false;

    /**
     * Indicates that the persisting operation should not proceed.
     */
    public function abortPersistence()
    {
        $this->abortPersistence = true;
    }

    /**
     * Checks if a listener has set the event to abort the persisting
     * operation.
     *
     * @return bool
     */
    public function isPersistenceAborted()
    {
        return $this->abortPersistence;
    }
}
