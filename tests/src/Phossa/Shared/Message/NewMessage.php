<?php
namespace Phossa\Shared\Message;

class NewMessage extends Message
{
    /**
     * person not found
     */
    const PERSON_NOT_FOUND = 1610101158;

    /**
     * {@inheritdoc}
     */
    protected static $messages = [
        self::PERSON_NOT_FOUND => 'Person "%s" not found'
    ];
}
