<?php
/**
 * 
 * @author Vladimir Shestakov
 * @version 1.0
 */
namespace interfaces;

use boolive\basic\controller\controller;
use boolive\core\commands\Commands;
use boolive\core\data\Data;

class interfaces extends controller
{
    function work($v, $input, Commands $commands)
    {
        /** @todo start all children */
        return $this->site->start($input, $commands);
    }
}
 