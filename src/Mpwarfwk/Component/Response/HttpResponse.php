<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 16/03/2015
 * Time: 19:40
 */
namespace Mpwarfwk\Component\Response;

class HttpResponse
{
    protected $content;
    protected $status;
    public function __construct($content, $status = 200)
    {
        $this->content = $content;
        $this->status = $status;
    }
    public function send()
    {
        if ($this->status != 200)
        {
            // Add needed header. For example 404.
            header("HTTP/1.0 404 Not Found");
        }
        echo $this->content;
    }
}