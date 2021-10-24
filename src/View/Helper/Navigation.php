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

    protected $defaultPluginManagerHelpers
        = [
            'zf3b4menu'    => Helper\Navigation\Menu::class,
            'ztbmenu'      => Helper\Navigation\Menu::class,
            'ztbsubmenu'   => Helper\Navigation\SubMenu::class,
            'zf3b4submenu' => Helper\Navigation\SubMenu::class,
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
