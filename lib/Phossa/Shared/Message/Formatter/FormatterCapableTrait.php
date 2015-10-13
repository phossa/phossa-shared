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
 * Formatter capable Trait
 *
 * Implementation of FormatterCapableInterface.
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
     * Message formatter.
     *
     * Used to format message. Shared by all descendant classes.
     *
     * @type   FormatterInterface
     * @access private
     * @static
     */
    private static $formatter = null;

    /**
     * Set the formatter.
     *
     * @param  FormatterInterface $formatter the message formatter
     * @return void
     * @access public
     * @static
     * @api
     */
    public static function setMessageFormatter(FormatterInterface $formatter)
    {
        self::$formatter = $formatter;
    }

    /**
     * Get the formatter.
     *
     * @param  void
     * @return FormatterInterface
     * @throws Exception\NotFoundException
     *         if no formatter found
     * @access public
     * @static
     * @api
     */
    public static function getMessageFormatter()/*# : FormatterInterface */
    {
        if (self::hasMessageFormatter()) return self::$formatter;
        throw new Exception\NotFoundException('Message formatter not found');
    }

    /**
     * Check the formatter.
     *
     * @param  void
     * @return bool
     * @access public
     * @static
     * @api
     */
    public static function hasMessageFormatter()/*# : bool */
    {
        return self::$formatter !== null;
    }
}
