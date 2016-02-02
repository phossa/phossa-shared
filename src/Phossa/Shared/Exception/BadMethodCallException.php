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

namespace Phossa\Shared\Exception;

/**
 * BadMethodCallException for \Phossa\Shared
 *
 * @package Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @see     \BadMethodCallException
 * @version 1.0.0
 * @since   1.0.0 added
 */
class BadMethodCallException extends \BadMethodCallException implements
    ExceptionInterface
{
}
