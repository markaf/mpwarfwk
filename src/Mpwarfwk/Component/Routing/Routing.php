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
class Routing {

    public function __construct(){
        echo "-routing";
    }
    public function getRouteController(Request $request){
        //llegeixes fitxer  ["DOCUMENT_ROOT"]/../config/routes.js
        $root  = $request->server->getString("DOCUMENT_ROOT");
        $url  = $request->server->getString("SCRIPT_URL");
        $yaml = new Parser();

        $value = $yaml->parse(file_get_contents($root.'/../config/routes.yml'));
        var_dump($value);
        echo "<pre>";
        echo "asdcasdksanclkasdcnlk";
       // var_dump($value);
        echo "</pre>";
        die;
        return "\Controller\Home";
    }
}
