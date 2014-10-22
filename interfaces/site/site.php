<?php
/**
 * site
 * @aurhor Vladimir Shestakov
 * @version 1.0
 */
namespace interfaces\site;

use boolive\basic\widget\widget;
use boolive\core\request\Request;

class site extends widget
{
    function work($v, Request $request)
    {
        // Вызов всех подчиенных, чтобы исполнить после их команды добавления тегов
        $v = [
            'body' => $this->body->start($request)
        ];
        //$v = $this->startChildren();

        // Обработка своих команд для вставки тегов в заголовок HTML
        if ($redirect = $request->getCommands('redirect')){
            header('Location: '.$redirect[0][0]);
            return true;
        }
        $v['head'] = '';
        $js = '';
//        $request->htmlHead('base', array('href'=>'http://'.Input::SERVER()->HTTP_HOST->string().'/'), true);
        // Meta
//        $site = Data::read('');
//        if ($site->favicon->isExist()){
//            $requests->htmlHead('link', array('rel'=>'shortcut icon', 'type'=>$site->favicon->mime(), 'href'=>$site->favicon->file().'?'.$site->favicon->date(true)));
//        }
        $v['meta'] = array(
            'title' => 'Сайт',//$site->title->is_exist()? array($site->title->value()) : array(),
            'description' => '',//$site->description->is_exist()? array($site->description->value()) : array(),
            'keywords' => array(),
        );
        $uniq = array();
        foreach ($request->getCommands('htmlHead') as $com){
            if ($com[0]=='title'){
                $v['meta'][$com[0]][] = $com[1]['text'];
            }else
            if ($com[0]=='meta' && in_array($com[1]['name'], array('description', 'keywords'))){
                $v['meta'][$com[1]['name']][] = $com[1]['content'];
            }else
            if (empty($com[2]) || empty($uniq[$com[0]])){
                if (isset($com[1]['text'])){
                    $text = $com[1]['text'];
                    unset($com[1]['text']);
                }else{
                    $text = false;
                }
                $attr = '';
                foreach ($com[1] as $name => $value) $attr.=' '.$name.'="'.$value.'"';
                if ($text === false){
                    $tag = '<'.$com[0].$attr."/>\n";
                }else{
                    $tag = '<'.$com[0].$attr.'>'.$text.'</'.$com[0].">\n";
                }
                if ($com[0] == 'script'){
                    $js.=$tag;
                }else{
                    $v['head'].=$tag;
                }
                $uniq[$com[0]] = true;
            }
        }
        $v['head'].=$js;
        return parent::work($v, $request);
    }
} 