<?php
/**
 * body
 * @aurhor Vladimir Shestakov
 * @version 1.0
 */
namespace interfaces\site\body;

use boolive\basic\widget\widget;
use boolive\core\commands\Commands;

class body extends widget
{
    function work($v, $input, Commands $commands)
    {
        $v = $this->startChildren($input, $commands, true, $v);
        return parent::work($v, $input, $commands);
    }
}