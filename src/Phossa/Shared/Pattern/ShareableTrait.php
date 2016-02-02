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

namespace Phossa\Shared\Pattern;

use Phossa\Shared\Exception;

/**
 * ShareableTrait
 *
 * @trait
 * @package Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @version 1.0.4
 * @since   1.0.4 added
 */
trait ShareableTrait
{
    /**
     * Shareables' pool
     *
     * Use array here to make ShareableInterface class INHERITABLE!
     *
     * @var    ShareableInstance[]
     * @access private
     * @static
     */
    private static $shareables = [];

    /**
     * {@inheritDoc}
     */
    public function __construct()
    {
    }

    /**
     * {@inheritDoc}
     */
    final public static function getShareable()/*# : ShareableInterface */
    {
        $class = get_called_class();
        if (!isset(self::$shareables[$class])) {
            self::$shareables[$class] = new static();
        }
        return self::$shareables[$class];
    }

    /**
     * {@inheritDoc}
     */
    public function isShareable()/*# : bool */
    {
        return $this === static::getShareable();
    }

    /**
     * __clone() is executed only on the cloned copy
     *
     * @access public
     */
    public function __clone()
    {
    }

    /**
     * prevent shareable copy from being serialized.
     *
     * @throws Exception\BadMethodCallException
     * @access public
     */
    public function __sleep()
    {
        if ($this->isShareable()) {
            throw new Exception\BadMethodCallException(
                'This is the shareable/global copy. __wakeup() is forbidden'
            );
        }
    }
}
