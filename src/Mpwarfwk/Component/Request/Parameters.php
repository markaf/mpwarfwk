<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 16/03/2015
 * Time: 21:41
 */

namespace Mpwarfwk\Component\Request;


class Parameters {
    private $parameters;
    public function __construct($parameters)
    {
        $this->parameters = $parameters;
    }
    public function getString($key)
    {
        if (!empty($this->parameters[$key]) && filter_var($this->parameters[$key], FILTER_SANITIZE_STRING))
        {
            return $this->parameters[$key];
        }
        return false;
    }
    public function getRawValue($key)
    {
        if (!empty($this->parameters[$key]))
        {
            return $this->parameters[$key];
        }
        return false;
    }

    public function getParameter(){
        return $this->parameters;
    }
} 