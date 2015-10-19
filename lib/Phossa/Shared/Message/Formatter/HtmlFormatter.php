<?php
/*
 * Phossa Project
 *
 * @see         http://www.phossa.com/
 * @copyright   Copyright (c) 2015 phossa.com
 * @license     http://mit-license.org/ MIT License
 */
/*# declare(strict_types=1); */

namespace Phossa\Shared\Message\Formatter;

/**
 * Simple HTML formatter for message package
 *
 * @package \Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @version 1.0.0
 * @since   1.0.0 added
 */
class HtmlFormatter implements FormatterInterface
{
    /**
     * opening tag
     *
     * @var    string
     * @type   string
     * @access protected
     */
    protected $openTag  = '<span class="message">';

    /**
     * closing tag
     *
     * @var    string
     * @type   string
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
        if ($openTag) $this->openTag = $openTag;
        if ($closeTag) $this->closeTag = $closeTag;
    }

    /**
     * {@inheritdoc}
     */
    public function formatMessage(
        /*# string */ $template,
        array $arguments = []
    )/*# : string */ {
        // convert arguments to strings
        array_walk($arguments, function(&$v) {
            $v = (string) $v;
        });

        // make sure '%s' count in $template is same as size of $arguments
        $count = substr_count($template, '%s');
        $size  = sizeof($arguments);
        if ($count > $size) {
            $arguments = $arguments + array_fill($size, $count - $size, '');
        } else if ($count < $size) {
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
