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
 * Static trait
 *
 * Static trait in case you can't inherit StaticAbstract
 *
 * @trait
 * @package Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @version 1.0.0
 * @since   1.0.0 added
 */
trait StaticTrait
{
    /**
     * Finalized private constructor to prevent instantiation.
     *
     * @access private
     * @return void
     * @final
     */
    final private function __construct()
    {
    }

    /**
     * Finalized private __clone() to prevent cloning
     *
     * @access private
     * @return void
     * @final
     */
    final private function __clone()
    {
    }
}
