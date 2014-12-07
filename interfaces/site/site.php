<?php
/**
 * site
 * @aurhor Vladimir Shestakov
 * @version 1.0
 */
namespace interfaces\site;

use boolive\basic\layout\layout;
use boolive\core\data\Data;
use boolive\core\request\Request;
use boolive\core\values\Rule;

class site extends layout
{
    function startRule()
    {
        return Rule::arrays([
            'REQUEST' => Rule::arrays([
                'path' => Rule::string(),
            ]),
            //'previous' => Rule::eq(false)
        ]);
    }

    function work(Request $request)
    {
        // Объект по URI запроса
        $obj = Data::read('/contents'.$request['REQUEST']['path']);
        $request->mix(['REQUEST' => ['object' => $obj]]);
        return parent::work($request);
    }

    function show($v, Request $request)
    {
        // Вызов всех подчиенных, чтобы исполнить после их команды добавления тегов
        $v = [
            'body' => $this->body->start($request)
        ];
        return parent::show($v, $request);
    }
} 