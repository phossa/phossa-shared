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
 * DuplicationFoundException for \Phossa\Shared
 *
 * @package Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @see     \RuntimeException
 * @version 1.0.0
 * @since   1.0.0 added
 */
class DuplicationFoundException extends \RuntimeException implements
    ExceptionInterface
{
}
