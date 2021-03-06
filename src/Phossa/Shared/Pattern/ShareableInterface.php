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

/**
 * ShareableInterface
 *
 * Instances can be generated with `new`, but a singleton copy can only be
 * get thru `getInstance()`
 *
 * @interface
 * @package Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @version 1.0.8
 * @since   1.0.4 added
 * @since   1.0.8 rename getShareable() to getInstance()
 */
interface ShareableInterface
{
    /**
     * Constructor signature
     *
     * @access public
     * @api
     */
    public function __construct();

    /**
     * Get the global instance.
     *
     * @return ShareableInterface
     * @access public
     * @static
     * @api
     */
    public static function getInstance()/*# : ShareableInterface */;

    /**
     * Is this the shareable(singleton) copy
     *
     * @return bool
     * @access public
     * @api
     */
    public function isShareable()/*# : bool */;
}
