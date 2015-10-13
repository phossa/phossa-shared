<?php
/*
 * Phossa Project
 *
 * @see         http://www.phossa.com/
 * @copyright   Copyright (c) 2015 phossa.com
 * @license     http://mit-license.org/ MIT License
 */
/*# declare(strict_types=1); */

namespace Phossa\Shared\Message;

/**
 * Message interface
 *
 * Convert a message code (constant) into readable message. Message translation
 * and formatting is possible via message 'Loader' and message 'Formatter'.
 *
 * @interface
 * @package \Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @version 1.0.0
 * @since   1.0.0 added
 */
interface MessageInterface
{
    /**
     * Get the message base on the code and other arguments
     *
     * This method takes variable arguments
     *
     *  - if first argument is the message code (int), the remaining arguments
     *    are for the '%s' in the message template.
     *
     *  - if first argument is not numeric, then return the first argument.
     *
     * e.g.
     * <code>
     *     // result: 'Hello John'
     *     Message::get(Message::MSG_HELLO, 'John');
     * </code>
     *
     * @return string
     * @access public
     * @static
     * @api
     */
    public static function get(/* ... */)/*# : string */;
}
