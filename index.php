<?php
/**
 * Boolive skeleton
 * Запуск проекта
 *
 * @version 2
 * @author Vladimir Shestakov <boolive@yandex.ru>
 * @link http://boolive.ru
 */
use boolive\core\Core;
use boolive\core\data\Data;
use boolive\core\request\Request;

/** @const Времея начала работы системы */
define('START_TIME', microtime(true));
/** @cont bool Установлена ли система Boolive? */
define('IS_INSTALL', true);
/** @const Версия системы Boolive */
define('VERSION', '2.0.beta.2014.02.10');
/** @cont string Директория сайта на сервере. Слеш в конце обязателен! */
define('DIR', __DIR__.'/');
/** @const string Директория временных файлов на сервере. Слеш в конце обязателен! */
define('DIR_TEMP', DIR.'temp/');
/** @const string Директория конфигураций. Слеш в конце обязателен! */
define('DIR_CONFIG', DIR.'config/');
// Адрес сайта, например: boolive.ru. Значение по умолчанию для CLI режима
define('HTTP_HOST', empty($_SERVER['HTTP_HOST'])?'boolive.ru' : $_SERVER['HTTP_HOST']);
/* Признак, выводить всю трассировку?*/
define('GLOBAL_TRACE', false);
/* Признак, профилировать запросы к модулю даных?*/
define('PROFILE_DATA', false);

// Get composer loader
$loader = include DIR.'vendor/autoload.php';
// Activate Boolive
Core::activate($loader);
// Start project (read and call root object)
echo Data::read('/interfaces')->start(new Request());
//trace(Data::find([
//    'from' => '/interfaces',
//    'select' => 'children',
//    //'struct' => 'tree',
//    'key'=>'name',
//    'depth' => 10
//]));
//$bench_cnt = 100;
//
//$test = 3;
//
////$dir = 'C:/Server/Sites/usurt/';
//
//// opendir
//if ($test == 1){
//    echo '#1<br>';
//    for ($i=0; $i<$bench_cnt; $i++){
//        $uri = '';
//        $depth = 1000;
//        if ($uri===''){
//            $dir = DIR;
//        }else{
//            $dir = DIR.trim($uri,'/').'/';
//        }
//        $objects = [];
//        // Открыть известный каталог и начать считывать его содержимое
//        $ignore = array_flip(['.','..','.git']);
//        if ($dh = opendir($dir)) {
//            $stack = [['dir' => $dir, 'name' => '', 'dh' => $dh, 'depth' => $depth, 'parent' => $uri]];
//            do {
//                $curr = end($stack);
//                while (($name = readdir($curr['dh'])) !== false) {
//                    if (!isset($ignore[$name])) {
//                        $uri = ($curr['name']==='')? $curr['parent'] : $curr['parent'].'/'.$curr['name'];
//                        if ($name == $curr['name'] . '.info') {
//                            $objects[] = $uri;
//                        } else
//                        if ($curr['depth'] && is_dir($path = $curr['dir'] . $name)) {
//                            if ($dh = opendir($path . '/')) {
//                                $stack[] = ['dir' => $path . '/', 'name' => $name, 'dh' => $dh, 'depth' => $curr['depth'] - 1, 'parent' => $uri];
//                                $curr = end($stack);
//                            }
//                        }
//                    }
//                }
//                closedir($curr['dh']);
//                array_pop($stack);
//            } while ($stack);
//        }
//    }
//}
//// glob
//if ($test == 2){
//    echo '#2<br>';
//    $glob = function($dir) use (&$glob)
//    {
//        $dirs = glob($dir.'*', GLOB_ONLYDIR|GLOB_NOSORT);
//        $objects = [];
//        foreach ($dirs as $dir){
//            $name = basename($dir);
//            if (!isset($ignore[$name])) {
//                if (is_file($dir.'/'.$name.'.info')){
//                    $objects[] = $dir;
//                }
//                $objects = array_merge($objects, $glob($dir.'/'));
//            }
//        }
//        return $objects;
//    };
//    for ($i=0; $i<$bench_cnt; $i++){
//        $uri = '';
//        $depth = 1000;
//        if ($uri===''){
//            $dir = DIR;
//        }else{
//            $dir = DIR.trim($uri,'/').'/';
//        }
//        $objects = $glob($dir);
//    }
//}
////
//if ($test == 3){
//    echo '#3<br>';
//    //for ($i=0; $i<$bench_cnt; $i++){
//        $uri = '';
//        $depth = 1000;
//        if ($uri===''){
//            $dir = DIR;
//        }else{
//            $dir = DIR.trim($uri,'/').'/';
//        }
//        $objects = [];
//        // Открыть известный каталог и начать считывать его содержимое
//        $ignore = array_flip(['.','..','.git']);
//        if ($dh = new DirectoryIterator($dir)) {
//            $stack = [['name' => '', 'dh' => $dh, 'depth' => $depth, 'parent' => $uri]];
//            do {
//                $curr = end($stack);
//                while($curr['dh']->valid()){
//                    /** @var DirectoryIterator $file */
//                    $file = $curr['dh']->current();
//                    $curr['dh']->next();
//                    if (($name = $file->getFilename())!==''){
//                        if (!isset($ignore[$name])) {
//                            $uri = ($curr['name']==='')? $curr['parent'] : $curr['parent'].'/'.$curr['name'];
//                            if ($name == $curr['name'] . '.info') {
//                                $objects[] = $uri;
//                            } else
//                            if ($curr['depth'] && $file->isDir()) {
//                                if ($dh = new DirectoryIterator($file->getPathname())) {
//                                    $stack[] = ['name' => $name, 'dh' => $dh, 'depth' => $curr['depth'] - 1, 'parent' => $uri];
//                                    $curr = end($stack);
//                                }
//                            }
//                        }
//                    }
//                }
//                array_pop($stack);
//            } while ($stack);
//        }
//    //}
//}
//
//foreach($objects as $file_or_dir) {
//    echo $file_or_dir . '<br>';
//}
//
//trace(\boolive\core\develop\Benchmark::stop('all', true));

