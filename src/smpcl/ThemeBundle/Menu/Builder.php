<?php
namespace smpcl\ThemeBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;


class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory)
    {
        $menu = $factory->createItem('root');
        $menu->setAttribute('class', 'nav');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());

        $menu->addChild('Inicio', array('route' => 'smpclThemeBundle_homepage'));
        $menu->addChild('Ayuda', array(
            'route' => 'smpclThemeBundle_static',
            'routeParameters' => array('name' => 'ayuda')
        ));
        // ... add more children

        return $menu;
    }
    
}