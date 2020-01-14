<?php
/**
 * User: whh935
 * Date: 2019/7/8 15:53
 * Desc: 剑指offer面试题4
 *      替换字符串中的空格为%20
 */

function replaceBlank($str)
{
    return str_replace(' ', '%20', $str);
}

$str = 'whh is cool!';
var_dump(replaceBlank($str));
