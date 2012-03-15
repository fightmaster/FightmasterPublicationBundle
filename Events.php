<?php

/**
 * This file is part of the FightmasterPublicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Fightmaster\PublicationBundle;

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
     * Fightmaster\PublicationBundle\Event\PublicationPersistEvent instance.
     *
     * Persisting of the publication can be aborted by calling
     * $event->abortPersist()
     *
     * @var string
     */
    const PUBLICATION_PRE_PERSIST = 'fightmaster_publication.publication.pre_persist';

    /**
     * The POST_PERSIST event occurs after the persistence backend
     * persisted the publication.
     *
     * This event allows you to notify users or perform other actions
     * that might require the publication to be persisted before performing
     * those actions. The listener receives a
     * Fightmaster\PublicationBundle\Event\PublicationEvent instance.
     *
     * @var string
     */
    const PUBLICATION_POST_PERSIST = 'fightmaster_publication.publication.post_persist';
    /**
     * The PRE_REMOVE event occurs prior to the removing the publication.
     *
     * This event allows you to modify the data in the publication prior
     * to removing occuring. The listener receives a
     * Fightmaster\PublicationBundle\Event\PublicationRemoveEvent instance.
     *
     * Removing of the publication can be aborted by calling
     * $event->abortRemove()
     *
     * @var string
     */
    const PUBLICATION_PRE_REMOVE = 'fightmaster_publication.publication.pre_remove';

    /**
     * The POST_REOVE event occurs after the remove backend
     * persisted the publication.
     *
     * This event allows you to notify users or perform other actions
     * that might require the publication to be removed before performing
     * those actions. The listener receives a
     * Fightmaster\PublicationBundle\Event\PublicationEvent instance.
     *
     * @var string
     */
    const PUBLICATION_POST_REMOVE = 'fightmaster_publication.publication.post_remove';

    /**
     * The CREATE event occurs when the manager is asked to create
     * a new instance of a publication.
     *
     * The listener receives a Fightmaster\PublicationBundle\Event\PublicationEvent
     * instance.
     *
     * @var string
     */
    const PUBLICATION_CREATE = 'fightmaster_publication.publication.create';
}
