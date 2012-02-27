<?php

namespace Fightmaster\PublicationBundle\Model;

use DateTime;

/**
 * Storage agnostic publication object
 *
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
abstract class Publication implements PublicationInterface
{
    /**
     * The unique ID of the publication
     *
     * @var int
     */
    protected $id;

    /**
     * The title of the publication
     *
     * @var string
     */
    protected $title;

    /**
     * The preview of the publication
     *
     * @var string
     */
    protected $preview;

    /**
     * The body of the publication
     *
     * @var string
     */
    protected $body;

    /**
     * The slug of the publication
     *
     * @var string
     */
    protected $slug;

    /**
     * Creation time of the publication
     *
     * @var DateTime
     */
    protected $createdAt;

    /**
     * @var DateTime|null
     */
    protected $updatedAt = null;

    public function __construct()
    {
        $this->setCreatedAt(new DateTime());
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return 'Publication @' . $this->getSlug();
    }

    /**
     * This method returns unique ID for the publication
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * This method returns the title of the publication
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * This method sets the title of the publication
     *
     * @param string $title
     *
     * @return PublicationInterface
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * This method returns the preview body of the publication
     *
     * @return string
     */
    public function getPreview()
    {
        return $this->preview;
    }

    /**
     * This method sets the preview body of the publication
     *
     * @param string $preview
     *
     * @return PublicationInterface
     */
    public function setPreview($preview)
    {
        $this->preview = $preview;

        return $this;
    }

    /**
     * This method returns the body of the publication
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * This method sets the body of the publication
     *
     * @param string $body
     *
     * @return PublicationInterface
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * This method returns the slug of the publication
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * This method sets the slug of the publication
     *
     * @param string $slug
     *
     * @return PublicationInterface
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * This method returns DateTime object. There is time when object was created.
     *
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * This method sets DateTime when object was created
     *
     * @param \DateTime $createdTime
     *
     * @return PublicationInterface
     */
    public function setCreatedAt(DateTime $createdTime)
    {
        $this->createdAt = $createdTime;

        return $this;
    }

    /**
     * This method returns DateTime object. There is time when object was updated
     *
     * @return DateTime|null
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * This method sets DateTime when object was updated
     *
     * @param \DateTime $updatedTime
     *
     * @return PublicationInterface
     */
    public function setUpdatedAt(DateTime $updatedTime)
    {
        $this->updatedAt = $updatedTime;

        return $this;
    }

    /**
     * This method returns author name
     *
     * @return string
     */
    public function getAuthorName()
    {
        return 'Fightmaster.publication.author.name';
    }

}
