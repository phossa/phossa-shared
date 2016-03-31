# phossa-shared
[![Build Status](https://travis-ci.org/phossa/phossa-shared.svg)](https://travis-ci.org/phossa/phossa-shared.svg)
[![HHVM Status](http://hhvm.h4cc.de/badge/phossa/phossa-shared.svg)](http://hhvm.h4cc.de/package/phossa/phossa-shared)
[![Latest Stable Version](https://poser.pugx.org/phossa/phossa-shared/v/stable)](https://packagist.org/packages/phossa/phossa-shared)
[![License](https://poser.pugx.org/phossa/phossa-shared/license)](https://packagist.org/packages/phossa/phossa-shared)

Introduction
---

Phossa-shared is the shared package required by other phossa packages.

Installation
---

Install via the `composer` utility.

```
composer require "phossa/phossa-shared=1.*"
```

or add the following lines to your `composer.json`

```json
{
    "require": {
       "phossa/phossa-shared": "^1.0.7"
    }
}
```

Features
---

- **Exception**

  All phossa exceptions implement `Phossa\Shared\Exception\ExceptionInterface`.
  To extend phossa exceptions,

  ```php
  <?php
  namespace Phossa\Cache\Exception;

  class BadMethodCallException extends
      \Phossa\Shared\Exception\BadMethodCallException
  {
  }

  ```

- **Message**

  `MessageAbstract` class is the base class for all `Message` classes in all
  phossa packages.

  - Define package related `Message` class

    `Message` class is used to convert message code into human-readable
    messages, and *MUST* define its own property `$messages`.

    ```php
    <?php
    namespace Phossa\Cache\Message;

    use Phossa\Shared\Message\MessageAbstract;

    class Message extends MessageAbstract
    {
        // use current year_month_date_hour_minute
        const CACHE_MESSAGE     = 1512220901;

        // driver failed
        const CACHE_DRIVER_FAIL = 1512220902;

        protected static $messages = [
            self::CACHE_MESSAGE      => 'cache %s',
            self::CACHE_DRIVER_FAILT => 'cache driver %s failed',
        ];
    }
    ```

  - `Message` class usage

    Usually only `Message::get()` and `Message::CONST_VALUE` are used.

    ```php
    use Phossa\Cache\Message\Message;
    ...
    // throw exception
    throw new Exception\RuntimeException(
        Message::get(Message::CACHE_DRIVER_FAIL, get_class($driver)),
        Message::CACHE_DRIVER_FAIL
    );
    ```

  - Message loader

    Used for loading different code to message mapping such as language files.

    ```php
    namespace Phossa\Cache;

    use Phossa\Shared\Message\Loader\LanguageLoader;

    // set language to 'zh_CN'
    $langLoader = new LanguageLoader('zh_CN');

    // will load local `Message\Message.zh_CN.php` language file
    Message\Message::setLoader($langLoader);

    // print message in chinese
    echo Message\Message::get(
        Message::CACHE_MESSAGE, get_class($object)
    );
    ```

  - Message formatter

    Used for formatting messages for different devices such as HTML page.

    ```php
    namespace Phossa\Cache;

    use Phossa\Shared\Message\Formatter\HtmlFormatter;

    // format message as HTML
    $formatter = new HtmlFormatter();

    Message\Message::setFormatter($formatter);

    // print as HTML
    echo Message\Message::get(
        Message::CACHE_MESSAGE, get_class($object)
    );
    ```

- **Pattern**

  Commonly used patterns in `Interface` or `Trait`

  - `StaticTrait`

    Used to be included in a static class which can not extends `StaticAbstract`

    ```php
    <?php
    namespace Phossa\MyPackage;

    class MyStaticClass extends SomeClass
    {
        use \Phossa\Shared\Pattern\StaticTrait;
        ...
    }
    ```

  - `StaticAbstract`

    Used to be extended by other classes.

    ```php
    <?php
    namespace Phossa\MyPackage;

    class MyStaticClass extends \Phossa\Shared\Pattern\StaticAbstract
    {
        ...
    }
    ```

  - `SingletonInterface` and `SingletonTrait`

    Used to be included in a singleton class.

    ```php
    <?php
    namespace Phossa\MyPackage;

    class MySingletonClass extends SomeClass
    {
        use \Phossa\Shared\Pattern\SingletonTrait;
        ...
    }
    ```

    Usage,

    ```php
    $obj =  MySingletonClass::getInstance();
    ```

    This singleton implementation has a feature which allows singleton class
    to extended.

    ```php
    <?php
    namespace Phossa\MyPackage;

    class MyNewSingletonClass extends MySingletonClass
    {
        ...
    }
    ```

  - `ShareableInterface` and `ShareableTrait`

    Multiple instances are allowed for `Shareable`, but only one global copy.
    Such as global event manager and lots of local event managers.

    ```php
    <?php
    namespace Phossa\Event;

    use Phossa\Shared\Pattern\ShareableInterface;

    class EventManager implements ShareableInterface
    {
        use \Phossa\Shared\Pattern\ShareableTrait;
        ...
    }
    ```

    Usage,

    ```php
    // global event manager instance
    $globalEM = EventManager::getShareable();

    // local event manager
    $localEM  = new EventManager();

    // this EM global ?
    if ($globalEM->isShareable()) {
        ...
    } else {
        ...
    }
    ```

- **Taggable**

  Added `TaggableInterface` and `TaggableTrait`.

- Support PHP 5.4+, PHP 7.0+, HHVM

- PHP7 ready for return type declarations and argument type declarations.

- PSR-1, PSR-2, PSR-4 compliant.

- Decoupled packages can be used seperately without the framework.

Dependencies
---

PHP >= 5.4.0

# License

[MIT License](http://mit-license.org/)
