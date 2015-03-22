<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 11/03/2015
 * Time: 20:39
 */

namespace Mpwarfwk\Component\Routing;

use Mpwarfwk\Component\Request\Request;
use \Symfony\Component\Yaml\Parser;
use Mpwarfwk\Component\Routing\Route;
class Routing {

    public function __construct(){
        //echo "-routing";
    }
    public function getRoute(Request $request){
        //llegeixes fitxer  ["DOCUMENT_ROOT"]/../config/routes.js
        $root  = $request->server->getString("DOCUMENT_ROOT");
        $url  = $request->server->getString("SCRIPT_URL");
        $configFile = json_decode(file_get_contents($root.'/../config/config.json'), true);
        $rootConfig = $root.'/../config';
        $value = $this->parseRoutesFile($configFile['routesFileType'], $rootConfig);

        $response = $this->extractRoute($value, $url);
        return new Route($response[0],$response[1]);
        //return "\Controller\Home";
    }

    private function extractRoute(array $routes, $url){
        foreach($routes as $key => $currentRoutre){
            $explode = explode("/",$url);
            $controller = '/'.$explode[1];
            if($key === $controller){
                return array($currentRoutre['controller'], $currentRoutre['action']);
            }
        }
    }

    private function parseRoutesFile($fileType, $rootConfig){
        if($fileType === "yml"){
            $yaml = new Parser();
            $value = $yaml->parse(file_get_contents($rootConfig.'/routes.yml'));
            return $value;
        }
        if($fileType === "php"){
            $value = include_once($rootConfig.'/routes.php');
            return $value;
        }
        if($fileType === "json"){
            $value = json_decode(file_get_contents($rootConfig.'/routes.json'), true);
            return $value;
        }


    }
}
