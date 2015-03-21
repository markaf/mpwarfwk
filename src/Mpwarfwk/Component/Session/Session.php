<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 16/03/2015
 * Time: 19:26
 */

namespace Mpwarfwk\Component\Session;


class Session {
    public function __construct()
    {
        session_start();
    }
    public function getValue($key)
    {
        if (!empty($_SESSION[$key]))
        {
            return $_SESSION[$key];
        }
        return false;
    }
    public function setValue($key, $value)
    {
        $_SESSION[$key] = $value;
    }
} 