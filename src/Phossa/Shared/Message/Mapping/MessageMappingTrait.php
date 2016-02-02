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

use Phossa\Shared\Exception;

/**
 * Implementation of MessageMappingInterface
 *
 * @trait
 * @package \Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @see     \Phossa\Shared\Message\Mapping\MessageMappingInterface
 * @version 1.0.0
 * @since   1.0.0 added
 */
trait MessageMappingTrait
{
    /**
     * Message mapping for current message class
     *
     * This property HAS TO BE redefined for each descendant message class
     *
     * @var    string[]
     * @type   string[]
     * @access protected
     * @static
     */
    protected static $messages = [];

    /**
     * Message mapping cache
     *
     * @var    array
     * @type   array
     * @access private
     * @static
     */
    private static $mappings = [];

    /**
     * {@inheritDoc}
     */
    public static function setMappings(
        array $messages
    ) {
        $class = get_called_class();
        self::$mappings[$class] = array_replace(
            $class::getMappings(),
            $messages
        );
    }

    /**
     * {@inheritDoc}
     */
    public static function hasMappings()/*# : bool */
    {
        return isset(self::$mappings[get_called_class()]);
    }

    /**
     * {@inheritDoc}
     */
    public static function getMappings()/*# : array */
    {
        $class = get_called_class();
        if (isset(self::$mappings[$class])) {
            return self::$mappings[$class];
        }
        return static::$messages;
    }

    /**
     * {@inheritDoc}
     */
    public static function resetMappings()
    {
        self::$mappings = [];
    }

    /**
     * {@inheritDoc}
     */
    public static function hasMessage(
        /*# int */ $code
    )/*# : bool */ {
        return isset(static::$messages[$code]);
    }

    /**
     * {@inheritDoc}
     */
    public static function getMessage(
        /*# int */ $code
    )/*# : string */ {
        $mapping = static::getMappings();
        if (isset($mapping[$code])) {
            return $mapping[$code];
        }
        throw new Exception\NotFoundException(
            sprintf(
                'Message not found for code %s in "%s"',
                $code,
                get_called_class()
            )
        );
    }
}
