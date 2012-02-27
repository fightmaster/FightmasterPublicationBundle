<?php

namespace Fightmaster\PublicationBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Fightmaster\PublicationBundle\Event\PublicationEvent;
use Fightmaster\PublicationBundle\Event\PublicationPersistEvent;
use Fightmaster\PublicationBundle\Events;
use Fightmaster\Model\Manager\DoctrineManager;

/**
 * Abstract Publication Manager implementation which can be used as base class for your
 * concrete manager.
 *
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
abstract class PublicationManager extends DoctrineManager implements PublicationManagerInterface
{
}
