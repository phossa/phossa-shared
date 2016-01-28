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
 * SingletonInterface
 *
 * @interface
 * @package \Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @version 1.0.4
 * @since   1.0.4 added
 */
interface SingletonInterface
{
    /**
     * Get the singleton instance.
     *
     * @param  void
     * @return SingletonInterface
     * @access public
     * @static
     * @api
     */
    public static function getInstance()/*# : SingletonInterface */;
}
