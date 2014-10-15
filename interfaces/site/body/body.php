<?php
/**
 * body
 * @aurhor Vladimir Shestakov
 * @version 1.0
 */
namespace interfaces\site\body;

use boolive\basic\widget\widget;
use boolive\core\commands\Commands;
use boolive\core\data\Data;

class body extends widget
{
    function work($v, $input, Commands $commands)
    {
        trace($this->res);
        $v = $this->startChildren($input, $commands, true, $v);
        return parent::work($v, $input, $commands);
    }

} 