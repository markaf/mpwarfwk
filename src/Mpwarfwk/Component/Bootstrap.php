<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 11/03/2015
 * Time: 17:58
 */

namespace Mpwarfwk\Component;

use Mpwarfwk\Component\Request\Request;
use Mpwarfwk\Component\Routing\Routing;
use Mpwarfwk\Component\Session\Session;
use Mpwarfwk\Component\Routing\Route;

class Bootstrap {

    public function __construct(){
        //echo "Hola mundo!";
    }
    public function run(){
        $session = new Session();
        $request = new Request($session);
        $routing = new Routing();
        $routeController = $routing->getRouteController($request);
        $controller = new $routeController();
    }

    public function executeController(Route $a, Request $b){

    }
}