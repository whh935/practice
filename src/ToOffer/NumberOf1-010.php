<?php
/**
 * User: whh935
 * Date: 2019/7/8 20:09
 * Desc: 剑指offer面试题10
 *      二进制中1的个数
 */

/**
 * 把一个整数减去1，再与原整数做按位与运算，会把该整数最右边一个1变成0
 */
function numberOf1($n)
{
    $count = 0;

    while ($n) {
        ++$count;
        $n = ($n - 1) & $n;
    }

    return $count;
}

$n = 7;
var_dump(numberOf1($n));

