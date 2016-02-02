# phossa-shared
[![Build Status](https://travis-ci.org/phossa/phossa-shared.svg)](https://travis-ci.org/phossa/phossa-shared.svg)
[![HHVM Status](http://hhvm.h4cc.de/badge/phossa/phossa-shared.svg)](http://hhvm.h4cc.de/package/phossa/phossa-shared)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/phossa/phossa-shared/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/phossa/phossa-shared/badges/quality-score.png?b=master)
[![Latest Stable Version](https://poser.pugx.org/phossa/phossa-shared/v/stable)](https://packagist.org/packages/phossa/phossa-shared)
[![License](https://poser.pugx.org/phossa/phossa-shared/license)](https://packagist.org/packages/phossa/phossa-shared)

Introduction
---

Phossa-shared is the shared (common) package required by all other phossa
packages.

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

- Exceptions

  All phossa related packages implements `Phossa\Shared\Exception\ExceptionInterface`.
  To extend phossa shared exceptions,

    ```php
    namespace Phossa\Cache\Exception;

    use \Phossa\Shared\Exception\BadMethodCallException as BMException;

    class BadMethodCallException extends BMException
    {
    }
    ```

- Messages

  `Message` class is used to convert message code into human-readable messages.
  Any subclass *MUST* define its own property `$messages`. Message loader maybe
  used to load different message mapping such as language files. Message
  formatter maybe used to output message in different format.

    ```php
    namespace Phossa\Cache\Message;

    use Phossa\Shared\Message\MessageAbstract;

    class Message extends MessageAbstract
    {
        // use current year-month-date-hour-minute
        const CACHE_MESSAGE         = 1512220901;

        protected static $messages = [
            self::CACHE_MESSAGE         => '%s',
        ];
    }
    ```

- Support PHP 5.4+, PHP 7.0+, HHVM

- PHP7 ready for return type declarations and argument type declarations.

- Decoupled packages can be used seperately without the framework.

Version
---

1.0.7

Dependencies
---

PHP >= 5.4.0

# License

[MIT License](http://spdx.org/licenses/MIT)