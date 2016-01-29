<?php

# system wide composer autoloader
/*
$basedir = dirname(__DIR__);

if (file_exists(dirname($basedir).'/autoload.php')) {
    # netbeans-env autoloader
    $loader = require dirname($basedir).'/autoload.php';
} elseif (file_exists($basedir.'/vendor/autoload.php')) {
    # package autoloader
    $loader = require $basedir.'/vendor/autoload.php';
}

$loader->add('Phossa\\Shared\\', $basedir . '/src/');
$loader->add('Phossa\\Shared\\', __DIR__ . '/src/');
 *
 */
require_once __DIR__.'/../vendor/autoload.php';
$classLoader = new \Composer\Autoload\ClassLoader();
$classLoader->add('Phossa\\Shared', __DIR__);
$classLoader->register(true);
