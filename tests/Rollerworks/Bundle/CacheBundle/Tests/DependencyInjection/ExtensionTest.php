<?php

namespace Rollerworks\Bundle\CacheBundle\Tests\DependencyInjection;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\Config\Definition\Processor;
use Rollerworks\Bundle\CacheBundle\DependencyInjection\RollerworksCacheExtension;
use Rollerworks\Bundle\CacheBundle\DependencyInjection\Compiler\SessionPass;

class ExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $container = $this->createContainer();
        $container->registerExtension(new RollerworksCacheExtension());
        $container->loadFromExtension('rollerworks_cache', array('session' => array()));
        $this->compileContainer($container);

        $this->assertEquals('_rollerworks_cache', $container->getParameter('rollerworks_cache.driver.session.storage_key'));
        $this->assertEquals('cache', $container->getParameter('rollerworks_cache.driver.session.bag_name'));
    }

    public function testSessionPass()
    {
        $container = $this->createContainer();
        $container->registerExtension(new RollerworksCacheExtension());
        $container->loadFromExtension('rollerworks_cache', array('session' => array()));
        $container->addCompilerPass(new SessionPass());
        $this->compileContainer($container);

        $this->assertEquals(
            array(array('registerBag', array(new Reference('rollerworks_cache.session_cache_bag')))),
            $container->getDefinition('session')->getMethodCalls()
        );
    }

    /**
     * @return ContainerBuilder
     */
    protected function createContainer()
    {
        $container = new ContainerBuilder(new ParameterBag(array(
            'kernel.charset'   => 'UTF-8',
            'kernel.debug'     => false,
        )));

        $container->set('service_container', $container);
        $container->setDefinition('session', new Definition('Symfony\Component\HttpFoundation\Session\Session'));

        return $container;
    }

    protected function compileContainer(ContainerBuilder $container)
    {
        $container->getCompilerPassConfig()->setOptimizationPasses(array());
        $container->getCompilerPassConfig()->setRemovingPasses(array());
        $container->compile();
    }
}
