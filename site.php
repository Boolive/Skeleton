<?php
/**
 * Класс
 *
 * @version 1.0
 */
class site extends \boolive\core\data\Entity
{
    function start()
    {
         $x = \boolive\core\data\Data::read('/vendor/boolive/basic/File');
    }
}