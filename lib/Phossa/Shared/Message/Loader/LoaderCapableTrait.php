<?php
/*
 * Phossa Project
 *
 * @see         http://www.phossa.com/
 * @copyright   Copyright (c) 2015 phossa.com
 * @license     http://mit-license.org/ MIT License
 */
/*# declare(strict_types=1); */

namespace Phossa\Shared\Message\Loader;

use Phossa\Shared\Exception;

/**
 * Implementation of LoaderCapableInterface
 *
 * @trait
 * @package \Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @version 1.0.0
 * @since   1.0.0 added
 */
trait LoaderCapableTrait
{
    /**
     * Message loaders pool, [ classname => $loader ]
     *
     * @var    array
     * @type   array
     * @access private
     * @static
     */
    private static $loaders = [];

    /**
     * loader update indicator
     *
     * @var    bool
     * @type   bool
     * @access private
     * @static
     */
    private static $updated = false;

    /**
     * {@inheritdoc}
     */
    public static function setLoader(
        LoaderInterface $loader
    ) {
        // set loader for current class
        self::$loaders[get_called_class()] = $loader;

        // update indicator
        static::setStatus(true);
    }

    /**
     * {@inheritdoc}
     */
    public static function unsetLoader()
    {
        // unset loader for current class
        unset(self::$loaders[get_called_class()]);

        // update indicator
        static::setStatus(true);
    }

    /**
     * {@inheritdoc}
     */
    public static function getLoader()/*# : LoaderInterface */
    {
        $class = get_called_class();
        if (isset(self::$loaders[$class])) {
            return self::$loaders[$class];
        }
        throw new Exception\NotFoundException(
            sprintf('Message loader not found for "%s"', $class)
        );
    }

    /**
     * {@inhertitdoc}
     */
    public static function hasLoader($search = true)
    {
        $class = get_called_class();
        if (isset(self::$loaders[$class])) return $class;

        if ($search) {
            do {
                if (isset(self::$loaders[$class])) return $class;
            } while (($class = get_parent_class($class)));
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public static function unsetTheLoader(
        LoaderInterface $loader
    ) {
        foreach(self::$loaders as $c => $l) {
            if ($loader === $l) {
                $c::unsetLoader();
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function getLoaders()/*# : array */
    {
        return self::$loaders;
    }

    /**
     * Set updated indicator
     *
     * @param  bool $status updated status
     * @return void
     * @access protected
     * @static
     * @api
     */
    protected static function setStatus($status = true)
    {
        self::$updated = $status;
    }

    /**
     * Get updated indicator
     *
     * @param  void
     * @return bool
     * @access protected
     * @static
     * @api
     */
    protected static function getStatus()/*: bool */
    {
        return self::$updated;
    }
}
