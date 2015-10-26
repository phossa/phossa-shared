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
 * Static trait
 *
 * Static trait in case you can't inherit StaticAbstract
 *
 * @trait
 * @package \Phossa\Shared
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
     * @final
     */
    final private function __construct()
    {
        // nothing here
    }

    /**
     * Finalized private __clone() to prevent cloning
     *
     * @access private
     * @final
     */
    final private function __clone()
    {
        // nothing here
    }
}
