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

namespace Phossa\Shared\Message\Loader;

use Phossa\Shared\Exception;

/**
 * Implementation of LoaderAwareInterface
 *
 * @trait
 * @package Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @see     Phossa\Shared\Message\Loader\LoaderAwareInterface
 * @version 1.0.0
 * @since   1.0.0 added
 */
trait LoaderAwareTrait
{
    /**
     * Message loaders pool, [ classname => $loader ]
     *
     * @var    LoaderInterface[]
     * @access private
     * @static
     */
    private static $loaders = [];

    /**
     * loader update indicator
     *
     * @var    bool
     * @access private
     * @static
     */
    private static $updated = false;

    /**
     * {@inheritDoc}
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
     * {@inheritDoc}
     */
    public static function unsetLoader()
    {
        // unset loader for current class
        unset(self::$loaders[get_called_class()]);

        // update indicator
        static::setStatus(true);
    }

    /**
     * {@inheritDoc}
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
    public static function hasLoader(
        /*# bool */ $search = true
    ) {
        $class = get_called_class();
        if (isset(self::$loaders[$class])) {
            return $class;
        }

        if ($search) {
            do {
                if (isset(self::$loaders[$class])) {
                    return $class;
                }
                $class = get_parent_class($class);
            } while ($class);
        }

        return false;
    }

    /**
     * {@inheritDoc}
     */
    public static function unsetTheLoader(
        LoaderInterface $loader
    ) {
        foreach (self::$loaders as $c => $l) {
            if ($loader === $l) {
                $c::unsetLoader();
            }
        }
    }

    /**
     * {@inheritDoc}
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
     */
    protected static function setStatus(
        /*# bool */ $status = true
    ) {
        self::$updated = $status;
    }

    /**
     * Get updated indicator
     *
     * @return bool
     * @access protected
     * @static
     */
    protected static function isStatusUpdated()/*: bool */
    {
        return self::$updated;
    }
}
