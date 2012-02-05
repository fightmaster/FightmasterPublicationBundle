<?php

namespace SarSport\PublicationBundle\Model;

/**
 * Abstract Publication Manager implementation which can be used as base class for your
 * concrete manager.
 *
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
abstract class PublicationManager implements PublicationManagerInterface
{
    /**
     * Creates an empty publication instance.
     *
     * @return Publication
     */
    public function createPublication()
    {
        $class = $this->getClass();
        $publication = new $class;

        return $publication;
    }
}
