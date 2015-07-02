<?php
/**
 * Конфигурация шаблонизаторов
 * Указывается маска расширения и соответствующей ей класс шаблонизатора
 */
return array(
    '*.tpl' => '\boolive\core\template\php\PHPTemplate',
    '*.txt' => '\boolive\core\template\text\TextTemplate',
    '*' => '\boolive\core\template\php\PHPTemplate',
);