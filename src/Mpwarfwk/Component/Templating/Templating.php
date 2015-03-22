<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 16/03/2015
 * Time: 19:48
 */

namespace Mpwarfwk\Component\Templating;
interface Templating
{
    public function render($template, $variables = null);
    public function assignVars($variables);
}