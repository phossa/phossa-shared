<?php
/**
 * Phossa Project
 *
 * PHP version 5.4
 *
 * @category  Library
 * @package   Phossa\Shared
 * @copyright 2015 phossa.com
 * @license   http://mit-license.org/ MIT License
 * @link      http://www.phossa.com/
 */
/*# declare(strict_types=1); */

namespace Phossa\Shared\Error;

/**
 * ErrorAwareInterface
 *
 * @package Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @version 1.0.10
 * @since   1.0.10 added
 */
interface ErrorAwareInterface
{
    /**
     * Error happened?
     *
     * @return bool
     * @access public
     */
    public function hasError()/*# : bool */;

    /**
     * Get current error message. '' for no error
     *
     * @return string
     * @access public
     */
    public function getError()/*# : string */;

    /**
     * Get current error code. '' for no error
     *
     * @return string
     * @access public
     * @api
     */
    public function getErrorCode()/*# : string */;

    /**
     * Set the error message and (optional) error code.
     *
     * Flush current error/code with ''/0
     *
     * @param  string $message (optional) error message
     * @param  string $code (optional) error code
     * @return this
     * @access public
     */
    public function setError(
        /*# string */ $message = '',
        /*# string */ $code = ''
    );
}
