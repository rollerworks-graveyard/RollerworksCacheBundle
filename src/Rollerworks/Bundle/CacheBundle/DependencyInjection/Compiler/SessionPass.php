<?php

/*
 * This file is part of the RollerworksCacheBundle package.
 *
 * (c) Sebastiaan Stok <s.stok@rollerscapes.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Rollerworks\Bundle\CacheBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

/**
 * Registers the 'SessionCacheBag' at the session service.
 *
 * This is done in a CompilerPass as the registering must
 * happen before the session is started.
 *
 * @author Sebastiaan Stok <s.stok@rollerscapes.net>
 */
class SessionPass implements CompilerPassInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('rollerworks_cache.driver.session_driver')) {
            return;
        }

        $container->getDefinition('session')->addMethodCall('registerBag', array(new Reference('rollerworks_cache.session_cache_bag')));
    }
}
