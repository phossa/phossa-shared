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
 * Simple HTML formatter for message package
 *
 * @package Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @see     \Phossa\Shared\Message\Formatter\FormatterInterface
 * @version 1.0.0
 * @since   1.0.0 added
 */
class HtmlFormatter implements FormatterInterface
{
    /**
     * opening tag
     *
     * @var    string
     * @access protected
     */
    protected $openTag  = '<span class="message">';

    /**
     * closing tag
     *
     * @var    string
     * @access protected
     */
    protected $closeTag = '</span>';

    /**
     * constructor
     *
     * @param  string $openTag opening tag
     * @param  string $closeTag closing tag
     * @access public
     * @api
     */
    public function __construct(
        /*# string */ $openTag = '',
        /*# string */ $closeTag = ''
    ) {
        if ($openTag) {
            $this->openTag = $openTag;
        }
        if ($closeTag) {
            $this->closeTag = $closeTag;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function formatMessage(
        /*# string */ $template,
        array $arguments = []
    )/*# : string */ {
        // convert arguments to strings
        array_walk($arguments, function (&$value) {
            $value = is_scalar($value) ? (string) $value :
                    substr(print_r($value, true), 0, 50);
        });

        // make sure '%s' count in $template is same as size of $arguments
        $count = substr_count($template, '%s');
        $size  = sizeof($arguments);
        if ($count > $size) {
            $arguments = $arguments + array_fill($size, $count - $size, '');
        } else {
            $template .= str_repeat(' %s', $size - $count);
        }

        // replace %s as <b>%s</b>
        return vsprintf(
            $this->openTag .
            str_replace('%s', '<b>%s</b>', $template) .
            $this->closeTag,
            $arguments
        );
    }
}
