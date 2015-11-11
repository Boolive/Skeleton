<?php
return [
    'dsn' => [
        'driver' => 'mysql',
        'dbname' => 'boolive2-beta',
        // Адрес сервера
        'host' => '127.0.0.1',
        // Порт
        'port' => '3306'
    ],
    'user' => 'root',
    'password' => '',
    'options' => [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES "utf8" COLLATE "utf8_bin"'
    ],
    'prefix' => ''
];