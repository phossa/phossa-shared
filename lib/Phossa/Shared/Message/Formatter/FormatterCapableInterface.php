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

/**
 * Message formatter capable interface
 *
 * @interface
 * @package \Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @see     FormatterCapableTrait
 * @version 1.0.0
 * @since   1.0.0 added
 */
interface FormatterCapableInterface
{
    /**
     * Set the formatter.
     *
     * @param  FormatterInterface $formatter the message formatter
     * @return void
     * @access public
     * @static
     * @api
     */
    public static function setMessageFormatter(
        FormatterInterface $formatter
    );

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
    public static function getMessageFormatter()/*# : FormatterInterface */;

    /**
     * Check the formatter.
     *
     * @param  void
     * @return bool
     * @access public
     * @static
     * @api
     */
    public static function hasMessageFormatter()/*# : bool */;
}
