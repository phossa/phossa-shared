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

use Phossa\Shared\Exception\LogicException;

/**
 * SingletonTrait
 *
 * @trait
 * @package Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @version 1.0.4
 * @since   1.0.4 added
 */
trait SingletonTrait
{
    /**
     * Singletons' pool
     *
     * Use array here to make Singleton class INHERITABLE!
     *
     * @var    SingletonInstance[]
     * @access private
     * @static
     */
    private static $singletons = [];

    /**
     * {@inheritDoc}
     */
    final public static function getInstance()/*# : SingletonInterface */
    {
        $class = get_called_class();
        if (!isset(self::$singletons[$class])) {
            self::$singletons[$class] = new static();
        }
        return self::$singletons[$class];
    }

    /**
     * no instantiation from outside
     *
     * @return void
     * @access private
     * @final
     */
    final private function __construct()
    {
    }

    /**
     * prevent from being cloned.
     *
     * @return void
     * @access public
     * @final
     */
    final public function __clone()
    {
        throw new LogicException('SINGLETON CAN NOT BE CLONED');
    }

    /**
     * prevent from being unserialized.
     *
     * @return void
     * @access public
     * @final
     */
    final public function __wakeup()
    {
        throw new LogicException('SINGLETON CAN NOT BE WAKEUP');
    }
}
