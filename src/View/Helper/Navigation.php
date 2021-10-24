<?php
/**
 * LaminasBootstrap4
 */

namespace LaminasBootstrap4\View\Helper;

use Laminas\View\Helper\Navigation as LaminasNavigation;
use LaminasBootstrap4\View\Helper;

/**
 * Navigation
 */
class Navigation extends LaminasNavigation
{
    protected $defaultProxy = 'lbs4menu';

    protected array $defaultPluginManagerHelpers
        = [
            'lbs4menu'      => Helper\Navigation\Menu::class,
            'lbs4ubmenu'   => Helper\Navigation\SubMenu::class,
        ];

    public function getPluginManager(): LaminasNavigation\PluginManager
    {
        $pm = parent::getPluginManager();
        foreach ($this->defaultPluginManagerHelpers as $name => $invokableClass) {
            $pm->setAllowOverride(true);
            $pm->setInvokableClass($name, $invokableClass);
        }

        return $pm;
    }
}
