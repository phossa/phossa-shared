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

use Phossa\Shared\Exception;

/**
 * Implementation of FormatterAwareInterface
 *
 * @trait
 * @package Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @see     \Phossa\Shared\Message\Formatter\FormatterAwareInterface
 * @version 1.0.0
 * @since   1.0.0 added
 */
trait FormatterAwareTrait
{
    /**
     * Message formatter
     *
     * Formatter is shared by all descendant message classes.
     *
     * @var    FormatterInterface
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
        if (static::hasFormatter()) {
            return self::$formatter;
        }
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
