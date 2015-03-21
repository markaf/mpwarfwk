<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 11/03/2015
 * Time: 21:42
 */

namespace Mpwarfwk\Component\Request;
use Mpwarfwk\Component\Session\Session;


class Request
{
    public $get;
    public $post;
    public $server;
    public $cookies;
    public $session;
    public function __construct(Session $session)
    {
        //var_dump($_SERVER);
        $this->get     = new Parameters($_GET);
        $this->post    = new Parameters($_POST);
        $this->server  = new Parameters($_SERVER);
        $this->cookies = new Parameters($_COOKIE);
        $this->session = $session;
        $_SERVER = $_POST = $_GET = $_COOKIE =  array();
    }
}

/*class Request {

    private $request;
    public function __construct(){
        $this->request = $_SERVER['REQUEST_URI'];
    }

    public function getRequest(){
        return $this->request;
    }
}*/