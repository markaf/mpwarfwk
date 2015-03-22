<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 18/03/2015
 * Time: 19:24
 */
namespace Mpwarfwk\Component\Container;

use Mpwarfwk\Component\Bootstrap;
class Container {

    public function __construct(){
        $this->root = Bootstrap::$documentRoot;
    }
    public function get($service)
    {
        $config = include $this->root . '/../config/services.php';
        $arguments = array();

        if (!empty($config[$service])) {
            if (!empty($config[$service]["arguments"])) {
                $reflection = new \ReflectionClass($config[$service]["path"]);
                foreach ($config[$service]["arguments"] as $currentArgument) {
                    if (class_exists($currentArgument)) {
                        $arguments[] = new $currentArgument;
                    } else {
                        $serviceArguments[] = $currentArgument;
                    }
                }
                return $reflection->newInstanceArgs($arguments);
            }
            return new $config[$service]["path"]();
        }
    }
}