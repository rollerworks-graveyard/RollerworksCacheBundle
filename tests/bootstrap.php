<?php

/**
 * This file is part of the RollerworksCacheBundle package.
 *
 * (c) 2012 Sebastiaan Stok <s.stok@rollerscapes.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use Composer\Autoload\ClassLoader;

error_reporting(E_ALL | E_STRICT);

if (!file_exists(__DIR__ . '/../vendor/autoload.php')) {
    throw new \RuntimeException('Did not find vendor/autoload.php. Please Install vendors using command: composer.phar install --dev');
}

/**
* @var $loader ClassLoader
*/
$loader = require_once __DIR__ . '/../vendor/autoload.php';
$loader->add('Rollerworks\\Bundle\\CacheBundle\\Tests', __DIR__);
