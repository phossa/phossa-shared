<?php
/**
 * Phossa Project
 *
 * PHP version 5.4
 *
 * @category  Library
 * @package   Phossa\PACKAGE
 * @copyright 2015 phossa.com
 * @license   http://mit-license.org/ MIT License
 * @link      http://www.phossa.com/
 */
/*# declare(strict_types=1); */

namespace Phossa\Shared\Arrayable;

/**
 * Convert object to/from array
 *
 * @package Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @version 1.0.11
 * @since   1.0.11 added
 */
interface ArrayableInterface
{
    /**
     * convert to array
     *
     * @return array
     * @access public
     */
    public function toArray()/*# : array */;

    /**
     * convert from array
     *
     * @param  array $data
     * @return self
     * @access public
     */
    public function fromArray(array $data);
}
