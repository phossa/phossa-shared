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
 * Managing the message mappings
 *
 * @interface
 * @package \Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @see     MessageManagerTrait
 * @version 1.0.0
 * @since   1.0.0 added
 */
interface MessageManagerInterface
{
    /**
     * Merge the code to message mapping array
     *
     * @type  int
     * @const
     */
    const MODE_MERGE    = 1;

    /**
     * Replace the code to message mapping array
     *
     * @type  int
     * @const
     */
    const MODE_REPLACE  = 2;

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
    );

    /**
     * Get current code to message template mapping array
     *
     * @param  void
     * @return array
     * @access public
     * @static
     */
    public static function getMessageMappings()/*# : array */;

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
    )/*# : bool */;

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
    )/*# : string */;
}
