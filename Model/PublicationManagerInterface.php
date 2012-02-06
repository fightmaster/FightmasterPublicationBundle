<?php

namespace SarSport\PublicationBundle\Model;

/**
 * Interface to be implemented by publication managers. This adds an additional level
 * of abstraction between your application, and the actual repository.
 *
 * All changes to publications should happen through this interface.
 *
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
interface PublicationManagerInterface
{
    /**
     * Find one publication by its ID.
     *
     * @param int
     * @return Publication|null
     */
    public function findPublicationById($id);

    /**
     * Find one publication by its slug.
     *
     * @param string
     * @return Publication|null
     */
    public function findPublicationBySlug($slug);

    /**
     * Adds a publication.
     *
     * @param PublicationInterface $publication
     */
    public function savePublication(PublicationInterface $publication);

    /**
     * Creates an empty publication instance.
     *
     * @return Publication
     */
    public function createPublication();

    /**
     * Returns the publication fully qualified class name.
     *
     * @return string
     */
    public function getClass();
}
