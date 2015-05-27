<?php
/**
 * 
 * @author Vladimir Shestakov
 * @version 1.0
 */
namespace interfaces;

use boolive\basic\controller\controller;
use boolive\core\config\Config;
use boolive\core\errors\Error;
use boolive\core\events\Events;
use boolive\core\request\Request;

class interfaces extends controller
{
    function work(Request $request)
    {
        return $this->startChildren($request, false);
    }

    /**
     * @param $error Error
     */
    function test_error($error)
    {
        if ($error->getCode() == 403){
            echo 'Нет доступа';
        }else{
            return false;
        }
    }

}