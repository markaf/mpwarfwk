<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 11/03/2015
 * Time: 20:39
 */

namespace Mpwarfwk\Component;


class Routing {

    public function __construct(){
        echo "-routing";
    }

    public function getRouteController($url){
        return "\Controller\Home\Home";
    }
} 