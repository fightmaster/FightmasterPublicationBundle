<?php

namespace Fightmaster\PublicationBundle\Model;

use Fightmaster\Model\Manager\ManagerInterface;

/**
 * Interface to be implemented by publication managers. This adds an additional level
 * of abstraction between your application, and the actual repository.
 *
 * All changes to publications should happen through this interface.
 *
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
interface PublicationManagerInterface extends ManagerInterface
{
}
