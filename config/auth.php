<?php
/**
 * Настройки модуля авторизации
 */
return [
    // Эталон нового пользователей
    'user' => '/vendor/boolive/basic/user',
    // Список пользоватлей
    'users-list' => '/system/users',

    // Идентификаторы (uri) пользователей с безграничеными правами доступа
    'super-admins' => [
        '/system/users/admin',
    ],
];