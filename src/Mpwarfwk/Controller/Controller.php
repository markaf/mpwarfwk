<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 22/03/2015
 * Time: 4:46
 */

namespace Mpwarfwk\Controller;

use Mpwarfwk\Component\Database\MysqlProfilerStorage;
use Mpwarfwk\Component\Request\Request;
use Mpwarfwk\Component\Session\Session;
use Mpwarfwk\Component\Container\Container;

abstract class Controller {
    public function __construct(){

    }

    protected function get($service){
        $this->container = new Container();
        return $this->container->get($service);
    }
} 