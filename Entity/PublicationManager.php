<?php

namespace SarSport\PublicationBundle\Entity;

use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\EventDispatcher;
use SarSport\PublicationBundle\Model\PublicationManager as BasePublicationManager;
use SarSport\PublicationBundle\Model\PublicationInterface;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class PublicationManager extends BasePublicationManager
{
    /**
     * @var \Doctrine\ORM\EntityRepository
     */
    protected $repository;

    public function __construct(EventDispatcher $eventDispatcher, EntityManager $em, $class)
    {
        parent::__construct($eventDispatcher, $em, $class);
        $this->repository = $em->getRepository($class);
    }

    /**
     * Find one publication by its ID.
     *
     * @param int
     *
     * @return Publication|null
     */
    public function findPublicationById($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Find one publication by its slug.
     *
     * @param string
     *
     * @return Publication|null
     */
    public function findPublicationBySlug($slug)
    {
        return $this->repository->findOneBy(array('publication_slug'));
    }
}
