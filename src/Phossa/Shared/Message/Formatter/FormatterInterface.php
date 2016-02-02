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

namespace Phossa\Shared\Message\Formatter;

/**
 * Message formatter interface
 *
 * Used for formatting message, such as adding html tags for displaying in
 * browsers.
 *
 * @interface
 * @package Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @version 1.0.0
 * @since   1.0.0 added
 */
interface FormatterInterface
{
    /**
     * Format the message base on the template and the argument array.
     *
     * No exception thrown since this may cause infinite loop (Message usually
     * used with Exception)
     *
     * @param  string $template message template
     * @param  array $arguments arguments for the message
     * @return string
     * @access public
     * @api
     */
    public function formatMessage(
        /*# string */ $template,
        array $arguments = []
    )/*# : string */;
}
