<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 16/03/2015
 * Time: 19:42
 */
namespace Mpwarfwk\Component\Response;

class JsonResponse extends HttpResponse {
    public function send()
    {
        if ($this->status != 200)
        {
            header("HTTP/1.0 404 Not Found");
        }
        header('Content-Type: application/json');
        if (!is_array($this->content))
        {
            $this->content = array($this->content);
        }
        echo json_encode($this->content);
    }
}