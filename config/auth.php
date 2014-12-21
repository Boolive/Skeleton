<?php
/**
 * Настройки модуля авторизации
 */
return [
    // Эталон нового пользователей
    'user' => '/vendor/boolive/basic/user',
    // Список пользоватлей
    'users-list' => '/access/users',

    // Идентификаторы (uri) пользователей с безграничеными правами доступа
    'super-admins' => [
        '/access/users/admin',
    ],
];