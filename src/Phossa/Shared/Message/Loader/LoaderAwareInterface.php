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

/**
 * Set/get the message mapping loader
 *
 * - Loader is used to load different mappings instead of using the default.
 *   Usually, it is used to load language files.
 *
 * - Different message class may use different loader.
 *
 * @interface
 * @package Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @see     \Phossa\Shared\Message\Loader\LoaderAwareTrait
 * @version 1.0.0
 * @since   1.0.0 added
 */
interface LoaderAwareInterface
{
    /**
     * Set loader for current message class (static bind)
     *
     * @param  LoaderInterface $loader the mapping loader
     * @return void
     * @access public
     * @static
     * @api
     */
    public static function setLoader(
        LoaderInterface $loader
    );

    /**
     * Unset loader for current message class (static bind)
     *
     * @return void
     * @access public
     * @static
     * @api
     */
    public static function unsetLoader();

    /**
     * Get loader for current message class (static bind)
     *
     * @return LoaderInterface
     * @throws Exception\NotFoundException
     * @access public
     * @static
     * @api
     */
    public static function getLoader()/*# : LoaderInterface */;

    /**
     * Check loader for current message class (static bind) or ancestors
     *
     * if $search is true, search upwards in inhertiant tree for loader
     * if current class has no loader set
     *
     * @param  bool $search search upwards
     * @return mixed false | classname for which has loader
     * @access public
     * @static
     * @api
     */
    public static function hasLoader(
        /*# : bool */ $search = true
    );

    /**
     * Unset loader (unset with all classes using this loader)
     *
     * @param  LoaderInterface $loader
     * @return void
     * @access public
     * @static
     * @api
     */
    public static function unsetTheLoader(
        LoaderInterface $loader
    );

    /**
     * Get all loaders in [ classname => $loader ] mapping array
     *
     * @return LoaderInterface[]
     * @access public
     * @static
     * @api
     */
    public static function getLoaders()/*# : array */;
}
