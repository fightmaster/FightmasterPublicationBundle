<?php

/**
 * This file is part of the FightmasterPublicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Fightmaster\PublicationBundle\Event;

/**
 * An event related to a removing event that can be cancelled by a listener.
 *
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class PublicationRemoveEvent extends PublicationEvent implements RemoveEventInterface
{
    /**
     * @var bool
     */
    private $abortRemoving = false;

    /**
     * {@inheritdoc}
     */
    public function abortRemoving()
    {
        $this->abortRemoving= true;
    }

    /**
     * {@inheritdoc}
     *
     * @return bool
     */
    public function isRemovingAborted()
    {
        return $this->abortRemoving;
    }
}
