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
 * ShareableInterface
 *
 * Instances can be generated with `new`, but a singleton copy can only be
 * get thru `getShareable()`
 *
 * @interface
 * @package \Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @version 1.0.4
 * @since   1.0.4 added
 */
interface ShareableInterface
{
    /**
     * Constructor signature
     *
     * @param  void
     * @access public
     * @api
     */
    public function __construct();

    /**
     * Get the singleton instance.
     *
     * @param  void
     * @return ShareableInterface
     * @access public
     * @static
     * @api
     */
    public static function getShareable()/*# : ShareableInterface */;

    /**
     * Is this the shareable(singleton) copy
     *
     * @param  void
     * @return bool
     * @access public
     * @api
     */
    public function isShareable()/*# : bool */;
}