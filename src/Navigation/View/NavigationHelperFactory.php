<?php

namespace LaminasBootstrap4\Navigation\View;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use LaminasBootstrap4\View\Helper\Navigation;

/**
 *
 */
final class NavigationHelperFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): Navigation
    {
        return (new Navigation())->setServiceLocator($container);
    }
}
