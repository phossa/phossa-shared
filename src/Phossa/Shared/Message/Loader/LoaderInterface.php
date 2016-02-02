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
 * Message loader interface
 *
 * Used for loading message mappings (such as language translations) for
 * different message classes from various source, e.g. from scattered
 * language files or one big file or from DB.
 *
 * @interface
 * @package Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @version 1.0.0
 * @since   1.0.0 added
 */
interface LoaderInterface
{
    /**
     * Load message mappings for the message $class.
     *
     * No exception thrown since this may cause infinite loop (Message usually
     * used with Exception). Return empty array if not found.
     *
     * @param  string $className the fully qualified message class name
     * @return array
     * @access public
     * @api
     */
    public function loadMessages(
        /*# string */ $className
    )/*# : array */;
}
