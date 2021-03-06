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

namespace Phossa\Shared\Message;

use Phossa\Shared\Pattern\StaticAbstract;

/**
 * Message Abstract Class
 *
 * - Used to convert message code into human-readable messages. Any subclass
 *   *MUST* define its own property <code>$messages</code>
 *
 * - Message loader maybe used to load different message mapping such as
 *   language files.
 *
 * - Message formatter maybe used to output message in different format.
 *
 * - Once loader set for parent class, it will affect all the descendant
 *   classes unless they have own loader set.
 *
 * - extending
 *   <code>
 *       // define a sub message class
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
 * - usage
 *   <code>
 *       // print 'Hello World'
 *       echo MyMessage::get(MyMessage::MSG_HELLO, 'World');
 *
 *       // used in exception
 *       throw new \Exception(MyMessage::get(MyMessage::MSG_HELLO, 'John'));
 *   </code>
 *
 * @abstract
 * @package Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @see     \Phossa\Shared\Pattern\StaticAbstract
 * @see     MessageInterface
 * @see     Loader\LoaderAwareInterface
 * @see     Mapping\MessageMappingInterface
 * @see     Formatter\FormatterAwareInterface
 * @see     Loader\LoaderAwareTrait
 * @see     Mapping\MessageMappingTrait
 * @see     Formatter\FormatterAwareTrait
 * @version 1.0.8
 * @since   1.0.0 added
 */
abstract class MessageAbstract extends StaticAbstract implements
    MessageInterface,
    Loader\LoaderAwareInterface,
    Mapping\MessageMappingInterface,
    Formatter\FormatterAwareInterface
{
    use Loader\LoaderAwareTrait,
        Mapping\MessageMappingTrait,
        Formatter\FormatterAwareTrait;

    /**
     * {@inheritDoc}
     */
    public static function get()/*# : string */
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
                return is_scalar($code) ? (string) $code : print_r($code, true);

            // first argument is numeric
            } else {
                $code = (int) $code;
            }
        }

        // search message class hierachy upwards to find message template
        $class = get_called_class();
        do {
            $template = 'message: %s';

            if ($class::hasMessage($code)) {
                // load message mapping
                static::loadMappings($class);

                // get the message template
                $template = $class::getMessage($code);
                break;
            }

            // last resort
            if ($class === __CLASS__) {
                break;
            }
            $class = get_parent_class($class);
        } while ($class);

        // built the message with remaining arguments
        return static::buildMessage($template, $args);
    }

    /**
     * Load message mappings for $class
     *
     * @param  string $class fully qualified class name
     * @return void
     * @access protected
     * @static
     */
    protected static function loadMappings(/*# string */ $class)
    {
        // mapping status changed ?
        if (self::isStatusUpdated()) {
            self::resetMappings();
            self::setStatus(false);
        }

        // $class' mapping loaded already
        if ($class::hasMappings()) {
            return;
        }

        // load $class mapping
        $loadedClass = $class::hasLoader();
        if ($loadedClass) {
            // loader found
            $class::setMappings(
                $loadedClass::getLoader()->loadMessages($class)
            );
        } else {
            // no loader found
            $class::setMappings([]);
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
        if (self::hasFormatter()) {
            return self::getFormatter()
                    ->formatMessage($template, $arguments);

        // default is vsprintf()
        } else {
            // make sure arguments are all strings
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
            return vsprintf($template, $arguments);
        }
    }
}
