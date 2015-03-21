<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 16/03/2015
 * Time: 19:34
 */

namespace Mpwarfwk\Component\Routing;


class Route {
    private $route_class;
    private $route_action;
    public function __construct($route_class, $route_action)
    {
        $this->route_class  = $route_class;
        $this->route_action = $route_action;
    }


    public function getRouteClass()
    {
        return $this->route_class;
    }


    public function getRouteAction()
    {
        return $this->route_action;
    }
} 