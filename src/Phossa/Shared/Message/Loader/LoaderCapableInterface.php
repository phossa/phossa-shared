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

/**
 * Set/get the message mapping loader
 *
 * - Loader is used to load different mappings instead of using the default.
 *   Usually, it is used to load language files.
 *
 * - Different message class may use different loader.
 *
 * @interface
 * @package \Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @see     Phossa\Shared\Message\Loader\LoaderCapableTrait
 * @version 1.0.0
 * @since   1.0.0 added
 */
interface LoaderCapableInterface
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
     * @param  void
     * @return void
     * @access public
     * @static
     * @api
     */
    public static function unsetLoader();

    /**
     * Get loader for current message class (static bind)
     *
     * @param  void
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
    public static function hasLoader($search = true);

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
     * @param  void
     * @return LoaderInterface[]
     * @access public
     * @static
     * @api
     */
    public static function getLoaders()/*# : array */;
}
