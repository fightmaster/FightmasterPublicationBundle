<?php

namespace SarSport\PublicationBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use SarSport\PublicationBundle\Model\PublicationInterface;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class PublicationEvent extends Event
{
    /**
     * @var \SarSport\PublicationBundle\Model\PublicationInterface
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
