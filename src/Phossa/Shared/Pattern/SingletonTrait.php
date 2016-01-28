<?php
/*
 * Phossa Project
 *
 * @see         http://www.phossa.com/
 * @copyright   Copyright (c) 2015 phossa.com
 * @license     http://mit-license.org/ MIT License
 */
/*# declare(strict_types=1); */

namespace Phossa\Shared\Pattern;

/**
 * SingletonTrait
 *
 * @trait
 * @package \Phossa\Shared
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
     * @param  void
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
     * @param  void
     * @return void
     * @access private
     * @final
     */
    final private function __clone()
    {
    }

    /**
     * prevent from being unserialized.
     *
     * @param  void
     * @return void
     * @access private
     * @final
     */
    final private function __wakeup()
    {
    }
}
