<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 16/03/2015
 * Time: 19:47
 */

class SmartyTemplate implements Templating {
    __contruct(){
    $this->view = new Smarty();
}


render(){
    //$this->assignVars($vsriables)
    return $this->view->fetch($template)
}

asssignVars($variables)
    foreach($varisables as key=>$value){
        $this->view->assign($key,$value);
    }
} 