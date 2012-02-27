<?php


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
