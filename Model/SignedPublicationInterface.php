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

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * A signed publication is bound to a FOS\UserBundle User model.
 *
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
interface SignedPublicationInterface extends PublicationInterface
{
    /**
     * Sets the author of the publication
     *
     * @param UserInterface $user
     */
    function setAuthor(UserInterface $author);

    /**
     * Gets the author of the publication
     *
     * @return UserInterface
     */
    function getAuthor();
}
