<?php
/**
 * User: whh935
 * Date: 2019/7/6 01:03
 * Desc: 剑指offer面试题2
 *      单例类
 */

class Singleton
{
    private static $instance = null;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}

$obj1 = Singleton::getInstance();
$obj2 = Singleton::getInstance();
var_dump($obj1 === $obj2);
exit;