<?php

/**
 * This file is part of the RollerworksCacheBundle.
 *
 * (c) Sebastiaan Stok <s.stok@rollerscapes.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Rollerworks\Bundle\CacheBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('rollerworks_cache');

        $rootNode
            ->children()
                ->arrayNode('session')
                    ->children()
                        ->scalarNode('storage_key')->defaultValue('_rollerworks_cache')->end()
                        ->scalarNode('bag_name')->defaultValue('cache')->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
