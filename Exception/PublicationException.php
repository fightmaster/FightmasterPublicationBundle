<?php

/**
 * This file is part of the FightmasterPublicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */


namespace Fightmaster\PublicationBundle\Exception;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class PublicationException extends \Exception implements Exception
{
    public static function savingAbortedByPrePersistEvent()
    {
        return new self('Saving of the publication was aborted by the pre-persist event');
    }
}
