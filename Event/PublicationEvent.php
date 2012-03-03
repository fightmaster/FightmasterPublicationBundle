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

use Symfony\Component\EventDispatcher\Event;
use Fightmaster\PublicationBundle\Model\PublicationInterface;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class PublicationEvent extends Event
{
    /**
     * @var \Fightmaster\PublicationBundle\Model\PublicationInterface
     */
    private $publication;

    public function __construct(PublicationInterface $publication)
    {
        $this->publication = $publication;
    }

    public function getPublication()
    {
        return $this->publication;
    }
}
