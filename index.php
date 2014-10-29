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
define('GLOBAL_TRACE', true);
/* Признак, профилировать запросы к модулю даных?*/
define('PROFILE_DATA', false);

// Get composer loader
$loader = include DIR.'vendor/autoload.php';
// Activate Boolive
Core::activate($loader);
// Start project (read and call root object)
//echo Data::read('/interfaces')->start(new Request());
//trace(Data::find([
//    'from' => '/interfaces',
//    'select' => 'children',
//    'depth' => 14
//]));

$dir = DIR."";
// Открыть известный каталог и начать считывать его содержимое
$ignore = array_flip(['.','..','.git']);
$depth = 10;

if ($dh = opendir($dir)) {
    $stack = [['dir' => $dir, 'name' => basename($dir), 'dh' => $dh, 'depth' => $depth]];
    do {
        $curr = end($stack);
        while (($file = readdir($curr['dh'])) !== false) {
            if (!isset($ignore[$file])) {
                if ($file == $curr['name'] . '.info') {
                    echo 'Object: ' . $curr['dir'] . '<br>';
                }else
                if ($curr['depth'] && is_dir($path = $curr['dir'] . $file)) {
                    if ($dh = opendir($path . '/')) {
                        $stack[] = ['dir' => $path . '/', 'name' => $file, 'dh' => $dh, 'depth' => $curr['depth'] - 1];
                        $curr = end($stack);
                    }
                }
            }
        }
        closedir($curr['dh']);
        array_pop($stack);
    } while ($stack);
}