<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 22/03/2015
 * Time: 1:51
 */

namespace Mpwarfwk\Component\Templating;

use Twig;
class TwigTemplate implements Templating {
    public function __construct($path)
    {
        $this->pathToTemplates($path);
        $loader = new \Twig_Loader_Filesystem($this->path);
        $this->view = new \Twig_Environment($loader, array());
        //$this->view = new Smarty();
    }
    public function render($template, $variables = null)
    {
        if(is_array($variables)) $this->assignVars($variables);
        return $this->view->render($template, $this->variables);
    }
    public function assignVars($variables)
    {
        $this->variables = $variables;
    }

    public function pathToTemplates($path){
        $this->path = $path;
    }
} 