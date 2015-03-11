<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 11/03/2015
 * Time: 17:58
 */

namespace Mpwarfwk\Component;

class Bootstrap {

    public function __construct(){
        echo "Hola mundo!";
    }
    public function run(){
        $routing = new Routing();
        $routeController = $routing->getRouteController("/home");
        $controller = new $routeController();
    }
}