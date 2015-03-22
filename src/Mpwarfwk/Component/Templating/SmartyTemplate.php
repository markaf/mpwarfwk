<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 16/03/2015
 * Time: 19:47
 */

namespace Mpwarfwk\Component\Templating;

use Smarty;

class SmartyTemplate implements Templating {
    public function __construct($path)
    {
        $this->pathToTemplates($path);
        $this->view = new Smarty();
    }
    public function render($template, $variables = null)
    {
        if(is_array($variables)) $this->assignVars($variables);
        return $this->view->fetch($this->path.'/'.$template);
    }
    public function assignVars($variables)
    {
        foreach ($variables as $key => $value)
        {
            $this->view->assign($key,$value);
        }
    }

    public function pathToTemplates($path){
        $this->path = $path;
    }
} 