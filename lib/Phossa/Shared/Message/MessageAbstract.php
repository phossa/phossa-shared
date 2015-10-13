<?php
/*
 * Phossa Project
 *
 * @see         http://www.phossa.com/
 * @copyright   Copyright (c) 2015 phossa.com
 * @license     http://mit-license.org/ MIT License
 */
/*# declare(strict_types=1); */

namespace Phossa\Shared\Message;

use Phossa\Shared\Pattern\StaticAbstract;

/**
 * Message Abstract Class
 *
 * Used to convert message code into human-readable messages. Any subclass
 * *MUST* define its own protected static class property <code>$messages</code>
 *
 * - message loader: define message loader to overwrite default message mapping.
 *   e.g. load language files
 *
 * - message formatter: define message formatter to print in customized format
 *
 * - e.g.
 *
 *   - subclassing
 *   <code>
 *       // define own message class
 *       class MyMessage extends \Phossa\Shared\Message\MessageAbstract
 *       {
 *           // MUST define own message codes, usually YearMonthDateMinute
 *           const MSG_HELLO = 1509280945;
 *
 *           // MUST define own message template mappings
 *           protected static $messages = [
 *               self::MSG_HELLO => 'Hello %s'
 *           ];
 *       }
 *   </code>
 *
 *   - usage
 *   <code>
 *       // print 'Hello World'
 *       MyMessage::get(MyMessage::MSG_HELLO, 'World');
 *   </code>
 *
 * @abstract
 * @package \Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @version 1.0.0
 * @since   1.0.0 added
 */
abstract class MessageAbstract extends StaticAbstract implements
    MessageInterface,
    Loader\LoaderCapableInterface,
    Manager\MessageManagerInterface,
    Formatter\FormatterCapableInterface
{
    use Loader\LoaderCapableTrait,
        Manager\MessageManagerTrait,
        Formatter\FormatterCapableTrait;

    /**
     * {@inheritdoc}
     */
    public static function get(/* ... */)/*# : string */
    {
        // process arguments
        $args = func_get_args();
        if (sizeof($args) < 1) {
            // return empty string
            return '';
        } else {
            $code = array_shift($args);
            // first argument is not numeric
            if (!is_numeric($code)) {
                return (string) $code;

            // first argument is numeric
            } else {
                $code = (int) $code;
            }
        }

        // search message class hierachy upwards to find message template
        $class = get_called_class();
        do  {
            if (isset($class::hasMessage($code))) {
                // load message mapping
                static::loadMappings($class);

                // get the message template
                $template = $class::getMessage($code);
                break;
            }

            // last resort
            if ($class === __CLASS__) {
                $template = 'message: %s';
                break;
            }
        } while($class = get_parent_class($class));

        // return the built message
        return static::buildMessage($template, $args);
    }

    /**
     * Load message mappings for $class
     *
     * @param  string $class fully qualified class name
     * @access protected
     * @static
     */
    protected static function loadMappings(
        /*# string */ $class
    ) {
        if (self::hasMessageLoader()) {
            $class::setMessageMappings(
                self::getMessageLoader()->loadMessageMappings($class),
                MessageManagerInterface::MODE_MERGE
            );
        }
    }

    /**
     * Build message from template and arguments.
     *
     * - Make sure '%s' matches the arguments provided.
     * - Use message formatter if exists
     *
     * @param  string $template message template
     * @param  array $arguments arguments for the template
     * @return string
     * @access protected
     * @static
     */
    protected static function buildMessage(
        /*# string */ $template,
        array $arguments
    )/*# : string */ {
        // use formatter
        if (self::hasMessageFormatter()) {
            return self::getMessageFormatter()
                    ->formatMessage($template, $arguments);

        // default is vsprintf()
        } else {
            // make sure arguments are all strings
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
            return vsprintf($template, $arguments);
        }
    }
}
