<?php
/*
 * Phossa Project
 *
 * @see         http://www.phossa.com/
 * @copyright   Copyright (c) 2015 phossa.com
 * @license     http://mit-license.org/ MIT License
 */
/*# declare(strict_types=1); */

namespace Phossa\Shared\Message\Mapping;

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
interface MessageMappingInterface
{
    /**
     * Set current class' message mappings (static bind)
     *
     * e.g.
     * <code>
     *     MyMessage::setMappings([
     *         MyMessage::MSG_HELLO => 'Hello %s'
     *     ]);
     * </code>
     *
     * @param  array $messages messages mapping array
     * @return void
     * @access public
     * @static
     */
    public static function setMappings(
        array $messages
    );

    /**
     * Check current class' message mapping array
     *
     * @param  void
     * @return bool
     * @access public
     * @static
     */
    public static function hasMappings()/*# : bool */;

    /**
     * Get current class' message mapping array
     *
     * @param  void
     * @return array
     * @access public
     * @static
     */
    public static function getMappings()/*# : array */;

    /**
     * Reset to initial mappings status
     *
     * @param  void
     * @return void
     * @access public
     * @static
     */
    public static function resetMappings();

    /**
     * Check message template from current class' message mapping
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
     * Get message template from current class' message mapping
     *
     * @param  int $code the message code
     * @return string
     * @throws Exception\NotFoundException
     * @access public
     * @static
     */
    public static function getMessage(
        /*# int */ $code
    )/*# : string */;
}
