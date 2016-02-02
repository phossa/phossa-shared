<?php
/**
 * Phossa Project
 *
 * PHP version 5.4
 *
 * @category  Package
 * @package   Phossa\Shared
 * @author    Hong Zhang <phossa@126.com>
 * @copyright 2015 phossa.com
 * @license   http://mit-license.org/ MIT License
 * @link      http://www.phossa.com/
 */
/*# declare(strict_types=1); */

namespace Phossa\Shared\Message\Formatter;

/**
 * Set/get the message formatter
 *
 * Formatter is used to format the result message.
 *
 * @interface
 * @package Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @see     \Phossa\Shared\Message\Formatter\FormatterAwareTrait
 * @version 1.0.0
 * @since   1.0.0 added
 */
interface FormatterAwareInterface
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
     * @return void
     * @access public
     * @static
     * @api
     */
    public static function unsetFormatter();

    /**
     * Get formatter
     *
     * @return FormatterInterface
     * @throws Exception\NotFoundException if formatter not set
     * @access public
     * @static
     * @api
     */
    public static function getFormatter()/*# : FormatterInterface */;

    /**
     * Check formatter existanse
     *
     * @return bool
     * @access public
     * @static
     * @api
     */
    public static function hasFormatter()/*# : bool */;
}
