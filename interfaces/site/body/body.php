<?php
/**
 * body
 * @aurhor Vladimir Shestakov
 * @version 1.0
 */
namespace interfaces\site\body;

use boolive\basic\widget\widget;
use boolive\core\request\Request;

class body extends widget
{
    function show($v, Request $request)
    {
        $v = $this->startChildren($request, true, $v);
        return parent::show($v, $request);
    }
}