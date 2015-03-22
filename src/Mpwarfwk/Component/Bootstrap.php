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

    private $environment;
    static $documentRoot;
    public function __construct($environment){
        $this->environment  = $environment;
    }

    public function run(){
        $session = new Session();
        $request = new Request($session);
        self::$documentRoot = $request->server->getString('DOCUMENT_ROOT');
        $routing = new Routing();
        $routeController = $routing->getRoute($request);
        $response = $this->executeController($routeController, $request);

        return $response;
    }

    public function executeController(Route $route, Request $request){
        $controller_class = $route->getRouteClass();
        return call_user_func_array(
            array(
                new $controller_class($request),
                $route->getRouteAction()
            ),
            array($request)
        );
    }
}