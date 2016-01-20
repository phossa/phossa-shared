<?php
/*
 * Phossa Project
 *
 * @see         http://www.phossa.com/
 * @copyright   Copyright (c) 2015 phossa.com
 * @license     http://mit-license.org/ MIT License
 */
/*# declare(strict_types=1); */

namespace Phossa\Shared\Exception;

/**
 * BadMethodCallException for \Phossa\Shared
 *
 * @package \Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @see     \BadMethodCallException
 * @version 1.0.0
 * @since   1.0.0 added
 */
class BadMethodCallException extends \BadMethodCallException implements
    ExceptionInterface
{

}
