<?php
namespace Phossa\Shared\Message;

class Message extends MessageAbstract
{
    /**
     * test not found
     */
    const TEST_NOT_FOUND    = 1510101158;

    /**
     * {@inheritdoc}
     */
    protected static $messages = [
        self::TEST_NOT_FOUND => 'Test "%s" not found',
    ];
}
