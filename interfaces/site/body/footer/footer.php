<?php
/**
 * footer
 * @aurhor Vladimir Shestakov
 * @version 1.0
 */
namespace interfaces\site\body\footer;

use boolive\basic\widget\widget;
use boolive\core\values\Rule;

class footer extends widget
{
    function startRule()
    {
        return Rule::arrays([
//            'REQUEST' => Rule::arrays([
//                'path' => Rule::string(),//regexp('|^/admin|'),
//            ]),
            'PATH' => Rule::arrays([
                0 => Rule::eq('admin')->required()
            ])
        ]);
    }
}