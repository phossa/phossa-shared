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
 * ErrorAwareTrait
 *
 * @package Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @see     ErrorAwareInterface
 * @version 1.0.10
 * @since   1.0.10 added
 */
trait ErrorAwareTrait
{
    /**
     * error message
     *
     * @var    string
     * @access protected
     */
    protected $error = '';

    /**
     * error code
     *
     * @var    string
     * @access protected
     */
    protected $error_code = '';

    /**
     * 0 or '0000' etc means no error, = ''
     *
     * @var    bool
     * @access protected
     */
    protected $zero_empty = true;

    /**
     * {@inheritDoc}
     */
    public function hasError()/*# : bool */
    {
        return '' === $this->error_code;
    }

    /**
     * {@inheritDoc}
     */
    public function getError()/*# : string */
    {
        return $this->error;
    }

    /**
     * {@inheritDoc}
     */
    public function getErrorCode()/*# : int */
    {
        return $this->error_code;
    }

    /**
     * {@inheritDoc}
     */
    public function setError(
        /*# string */ $message = '',
        /*# string */ $code = ''
    ) {
        $this->error = (string) $message;

        // zero ?
        $zcode = (string) $code;
        if ($this->zero_empty && '' === str_replace('0', '', $zcode)) {
            $this->error_code = '';
        } else {
            $this->error_code = $zcode;
        }
    }
}
