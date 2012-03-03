<?php

/**
 * This file is part of the FightmasterPublicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Fightmaster\PublicationBundle\Model;

use DateTime;

/**
 * Publication interface
 *
 * Any publication resource to be used by Fightmaster\PublicationBundle must implement this interface.
 *
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
interface PublicationInterface
{
    /**
     * This method returns unique ID for the publication
     *
     * @abstract
     * @return int
     */
    public function getId();

    /**
     * This method returns the title of the publication
     *
     * @abstract
     * @return string
     */
    public function getTitle();

    /**
     * This method sets the title of the publication
     *
     * @abstract
     * @param string $title
     * @return PublicationInterface
     */
    public function setTitle($title);

    /**
     * This method returns the preview body of the publication
     *
     * @abstract
     * @return string
     */
    public function getPreview();

    /**
     * This method sets the preview body of the publication
     *
     * @abstract
     * @param string $preview
     * @return PublicationInterface
     */
    public function setPreview($preview);

    /**
     * This method returns the body of the publication
     *
     * @abstract
     * @return string
     */
    public function getBody();

    /**
     * This method sets the body of the publication
     *
     * @abstract
     * @param string $body
     * @return PublicationInterface
     */
    public function setBody($body);

    /**
     * This method returns the slug of the publication
     *
     * @abstract
     * @return string
     */
    public function getSlug();

    /**
     * This method sets the slug of the publication
     *
     * @abstract
     * @param string $slug
     * @return PublicationInterface
     */
    public function setSlug($slug);

    /**
     * This method returns DateTime object. There is time when object was created.
     *
     * @abstract
     * @return DateTime
     */
    public function getCreatedAt();

    /**
     * This method sets DateTime when object was created
     *
     * @abstract
     * @param \DateTime $createdTime
     * @return PublicationInterface
     */
    public function setCreatedAt(DateTime $createdTime);

    /**
     * This method returns DateTime object. There is time when object was updated
     *
     * @abstract
     * @return DateTime|null
     */
    public function getUpdatedAt();

    /**
     * This method sets DateTime when object was updated
     *
     * @abstract
     * @param \DateTime $updatedTime
     * @return PublicationInterface
     */
    public function setUpdatedAt(DateTime $updatedTime);

    /**
     * This method returns author name
     *
     * @abstract
     * @return string
     */
    public function getAuthorName();
}
