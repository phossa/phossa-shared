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
 * Set/get the message formatter
 *
 * Formatter is used to format the result message.
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
     * Set formatter
     *
     * @param  FormatterInterface $formatter the message formatter
     * @return void
     * @access public
     * @static
     * @api
     */
    public static function setFormatter(
        FormatterInterface $formatter
    );

    /**
     * Unset formatter, and use the default
     *
     * @param  void
     * @return void
     * @access public
     * @static
     * @api
     */
    public static function unsetFormatter();

    /**
     * Get formatter
     *
     * @param  void
     * @return FormatterInterface
     * @throws Exception\NotFoundException
     * @access public
     * @static
     * @api
     */
    public static function getFormatter()/*# : FormatterInterface */;

    /**
     * Check formatter existanse
     *
     * @param  void
     * @return bool
     * @access public
     * @static
     * @api
     */
    public static function hasFormatter()/*# : bool */;
}
