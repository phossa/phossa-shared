<?php
/*
 * Phossa Project
 *
 * @see         http://www.phossa.com/
 * @copyright   Copyright (c) 2015 phossa.com
 * @license     http://mit-license.org/ MIT License
 */
/*# declare(strict_types=1); */

namespace Phossa\Shared\Message\Loader;

/**
 * Load language file from the same directory of the message class.
 *
 * If your message class is 'Your\NameSpace\YourMessage' then it will look
 * for the language file (YourMessage.LANG.php) in the same directory of the
 * message class file.
 *
 * @package \Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @see     Phossa\Shared\Message\Loader\LoaderInterface
 * @version 1.0.0
 * @since   1.0.0 added
 */
class LanguageLoader implements LoaderInterface
{
    /**
     * language setting. Use locale codes
     *
     * @var    string
     * @type   string
     * @access protected
     */
    protected $language = '';

    /**
     * constructor and set language
     *
     * @param  string $language language to use
     * @access public
     * @api
     */
    public function __construct(/*# string */ $language = 'zh_CN')
    {
        $this->setLanguage($language);
    }

    /**
     * Set language
     *
     * @param  string $language language to set
     * @return void
     * @access public
     * @api
     */
    public function setLanguage(/*# string */ $language)
    {
        $this->language = $language;
    }

    /**
     * Get language
     *
     * @param  void
     * @return string
     * @access public
     * @api
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Load language file from the same directory of message class.
     *
     * language file name is something like 'Message.zh_CN.php'
     *
     * {@inheritDoc}
     */
    public function loadMessages(
        /*# string */ $className
    )/*# : array */ {
        $map = [];

        // reflect
        if (class_exists($className)) {
            $class = new \ReflectionClass($className);
            $file  = $class->getFileName();
            // language file 'Message.php' -> 'Message.zh_CN.php'
            $nfile = substr_replace($file, '.' . $this->language . '.php', -4);
            if (file_exists($nfile)) {
                $res = include $nfile;
                if (is_array($res)) $map = $res;
            }
        }

        return $map;
    }
}
