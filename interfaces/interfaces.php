<?php
/**
 * 
 * @author Vladimir Shestakov
 * @version 1.0
 */
namespace interfaces;

use boolive\basic\controller\controller;
use boolive\core\request\Request;

class interfaces extends controller
{
    function work(Request $request)
    {
        /** @todo start all children */
        return $this->site->start($request);
    }
}
 