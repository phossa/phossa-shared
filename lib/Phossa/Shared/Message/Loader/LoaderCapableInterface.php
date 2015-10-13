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
 * @interface
 * @package \Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @see     LoaderCapableTrait
 * @version 1.0.0
 * @since   1.0.0 added
 */
interface LoaderCapableInterface
{
    /**
     * Set the message mapping loader.
     *
     * @param  LoaderInterface $loader the mapping loader
     * @return void
     * @access public
     * @static
     * @api
     */
    public static function setMessageLoader(
        LoaderInterface $loader
    );

    /**
     * Get the message mapping loader.
     *
     * @param  void
     * @return LoaderInterface
     * @throws Exception\NotFoundException
     *         if no loader found
     * @access public
     * @static
     * @api
     */
    public static function getMessageLoader()/*# : LoaderInterface */;

    /**
     * Check the message mapping loader.
     *
     * @param  void
     * @return bool
     * @access public
     * @static
     * @api
     */
    public static function hasMessageLoader()/*# : bool */;
}
