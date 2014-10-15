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
        $list = Data::find([
            'select' => 'children',
            'from' => $this,
            'key' => 'name',
            'order' => ['order','asc']
        ]);
        foreach ($list as $child) {
            $key = $child->name();
            $out = $child->start($input, $commands);
            if ($out !== false) {
                $v[$key] = $out;
                $input['previous'] = true;
            }
        }
        trace($v);
        return parent::work($v, $input, $commands);
    }

} 