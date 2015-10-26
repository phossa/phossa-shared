<?php
/*
 * Phossa Project
 *
 * @see         http://www.phossa.com/
 * @copyright   Copyright (c) 2015 phossa.com
 * @license     http://mit-license.org/ MIT License
 */
/*# declare(strict_types=1); */

namespace Phossa\Shared\Message\Formatter;

use Phossa\Shared\Exception;

/**
 * Implementation of FormatterCapableInterface
 *
 * @trait
 * @package \Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @see     FormatterCapableInterface
 * @version 1.0.0
 * @since   1.0.0 added
 */
trait FormatterCapableTrait
{
    /**
     * Message formatter
     *
     * Formatter is shared by all descendant message classes.
     *
     * @var    FormatterInterface
     * @type   FormatterInterface
     * @access private
     * @static
     */
    private static $formatter = null;

    /**
     * {@inheritDoc}
     */
    public static function setFormatter(
        FormatterInterface $formatter
    ) {
        self::$formatter = $formatter;
    }

    /**
     * {@inheritDoc}
     */
    public static function unsetFormatter()
    {
        self::$formatter = null;
    }

    /**
     * {@inheritDoc}
     */
    public static function getFormatter()/*# : FormatterInterface */
    {
        if (static::hasFormatter()) return self::$formatter;
        throw new Exception\NotFoundException(
            sprintf('Message formatter not found')
        );
    }

    /**
     * {@inheritDoc}
     */
    public static function hasFormatter()/*# : bool */
    {
        return self::$formatter !== null;
    }
}
