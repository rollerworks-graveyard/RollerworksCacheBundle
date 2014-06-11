<?php

/**
 * This file is part of the RollerworksCacheBundle package.
 *
 * (c) 2012 Sebastiaan Stok <s.stok@rollerscapes.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Rollerworks\Bundle\CacheBundle\Tests\DependencyInjection;

use Rollerworks\Bundle\CacheBundle\DependencyInjection\Configuration;
use Symfony\Component\Config\Definition\Processor;

class ConfigTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $processor = new Processor();
        $configuration = new Configuration();
        $config = $processor->processConfiguration($configuration, array(array('session' => array())));

        $this->assertEquals('_rollerworks_cache', $config['session']['storage_key']);
        $this->assertEquals('cache', $config['session']['bag_name']);
    }

    public function testOverwrite()
    {
        $processor = new Processor();
        $configuration = new Configuration(array());
        $config = $processor->processConfiguration($configuration, array(array('session' => array('storage_key' => '_my_app_cache', 'bag_name' => 'my_cache'))));

        $this->assertEquals('_my_app_cache', $config['session']['storage_key']);
        $this->assertEquals('my_cache', $config['session']['bag_name']);
    }
}
