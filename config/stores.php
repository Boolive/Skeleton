<?php
/**
 * Конфигурация модели данных
 */
return array(
    '' => [
        'class' => '\boolive\core\data\stores\FilesystemStore',
        'params'=> [

        ]
    ],
    '/test' => [
        'class' => '\boolive\core\data\stores\MySQLStore',
        'params' => array(
            // Имя источника данных
            'dsn' => array(
                // Тип СУБД
                'driver' => 'mysql',
                // Имя базы данных
                'dbname' => 'skeleton',
                // Адрес сервера
                'host' => '127.0.0.1',
                // Порт
                'port' => '3306'
            ),
            // Имя пользователя для подключения к базе данных
            'user' => 'root',
            // Пароль
            'password' => '',
            // Опции подключения
            'options' => array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES "utf8" COLLATE "utf8_bin"'
            ),
            // Префикс к таблицам
            'prefix' => '',
        )
    ]
);