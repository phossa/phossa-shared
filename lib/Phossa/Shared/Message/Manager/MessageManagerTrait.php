<?php
/*
 * Phossa Project
 *
 * @see         http://www.phossa.com/
 * @copyright   Copyright (c) 2015 phossa.com
 * @license     http://mit-license.org/ MIT License
 */
/*# declare(strict_types=1); */

namespace Phossa\Shared\Message\Manager;

/**
 * Message manager trait
 *
 * Implementation of MessageManagerInterface
 *
 * @trait
 * @package \Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @see     MesssageManagerInterface
 * @version 1.0.0
 * @since   1.0.0 added
 */
trait MessageManagerTrait
{
    /**
     * Message templates array
     *
     * Has to be overwritten by every descendant class
     *
     * @type   array
     * @access protected
     * @static
     */
    protected static $messages = [];

    /**
     * Merge or overwrite the code to message template mappings.
     *
     * e.g.
     * <code>
     *     MyMessage::setMessageMappings([
     *         MyMessage::MSG_HELLO => 'Hello %s'
     *     ]);
     * </code>
     *
     * @param  array $messages messages mapping array
     * @param  int $mode merge or replace
     * @return void
     * @access public
     * @static
     */
    public static function setMessageMappings(
        array $messages,
        /*# int */ $mode = MessageManagerInterface::MODE_MERGE
    ) {
        // merge with current message class' mapping array
        if ($mode === MessageManagerInterface::MODE_MERGE) {
            static::$messages = array_merge(static::$messages, $messages);

        // overwrite current message class' mapping array
        } else {
            static::$messages = $messages;
        }
    }

    /**
     * Get current code to message template mapping array
     *
     * @param  void
     * @return array
     * @access public
     * @static
     */
    public static function getMessageMappings()/*# : array */
    {
        return static::$messages;
    }

    /**
     * Check specific message template
     *
     * @param  int $code the message code
     * @return bool
     * @access public
     * @static
     */
    public static function hasMessage(
        /*# int */ $code
    )/*# : bool */ {
        return isset(static::$messages[$code]);
    }

    /**
     * Get the specific message template
     *
     * May use static::hasMessage() first to avoid exception
     *
     * @param  int $code the message code
     * @return string
     * @throws Exception\NotFoundException
     *         if message code $code not found
     * @access public
     * @static
     */
    public static function getMessage(
        /*# int */ $code
    )/*# : string */ {
        return (string) static::$messages[$code];
    }
}
