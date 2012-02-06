<?php
/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */

namespace SarSport\PublicationBundle;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
final class Events
{
    /**
     * The PRE_PERSIST event occurs prior to the persistence backend
     * persisting the publication.
     *
     * This event allows you to modify the data in the publication prior
     * to persisting occuring. The listener receives a
     * SarSport\PublicationBundle\Event\PublicationPersistEvent instance.
     *
     * Persisting of the publication can be aborted by calling
     * $event->abortPersist()
     *
     * @var string
     */
    const PUBCLICATION_PRE_PERSIST = 'sarsport_publication.publication.pre_persist';

    /**
     * The POST_PERSIST event occurs after the persistence backend
     * persisted the publication.
     *
     * This event allows you to notify users or perform other actions
     * that might require the publication to be persisted before performing
     * those actions. The listener receives a
     * SarSport\PublicationBundle\Event\PublicationEvent instance.
     *
     * @var string
     */
    const PUBLICATION_POST_PERSIST = 'sarsport_publication.publication.post_persist';

    /**
     * The CREATE event occurs when the manager is asked to create
     * a new instance of a publication.
     *
     * The listener receives a SarSport\PublicationBundle\Event\PublicationEvent
     * instance.
     *
     * @var string
     */
    const PUBLICATION_CREATE = 'sarsport_publication.publication.create';
}
