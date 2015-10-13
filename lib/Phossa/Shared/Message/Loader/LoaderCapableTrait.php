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
 * Loader capable Trait
 *
 * Implementation of LoaderCapableInterface.
 *
 * @trait
 * @package \Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @see     LoaderCapableInterface
 * @version 1.0.0
 * @since   1.0.0 added
 */
trait LoaderCapableTrait
{
    /**
     * Message loader
     *
     * Used to load message mappings. Shared by all descendant classes
     *
     * @var    LoaderInterface
     * @type   LoaderInterface
     * @access private
     * @static
     */
    private static $loader = null;

    /**
     * Set the message mapping loader.
     *
     * @param  LoaderInterface $loader the mapping loader
     * @return void
     * @access public
     * @static
     * @api
     */
    public static function setMessageLoader(LoaderInterface $loader)
    {
        self::$loader = $loader;
    }

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
    public static function getMessageLoader()/*# : LoaderInterface */
    {
        if (self::hasMessageLoader()) return self::$loader;
        throw new Exception\NotFoundException('Message loader not found');
    }

    /**
     * Check the message mapping loader.
     *
     * @param  void
     * @return bool
     * @access public
     * @static
     * @api
     */
    public static function hasMessageLoader()/*# : bool */
    {
        return self::$loader !== null;
    }
}
