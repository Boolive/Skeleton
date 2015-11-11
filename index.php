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
define('VERSION', '3.0.0');
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