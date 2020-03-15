<?php
/**
 * User: whh935
 * Date: 2020/3/8 22:23
 * Desc: 剑指offer面试题45
 *      0,1,,n-1这n个数字排成一个圆圈，从数字0开始，每次从这个圆圈里删除第m个数字。求出这个圆圈里剩下的最后一个数字。
 *      例如，0、1、2、3、4这5个数字组成一个圆圈，从数字0开始每次删除第3个数字，
 *      则删除的前4个数字依次是2、0、4、1，因此最后剩下的数字是3。
 */

/**
 * 递推公式：f(n,m)=[f(n-1,m)+m]%n
 * @param $n
 * @param $m
 * @return int
 */
function lastRemaining($n, $m)
{
    if ($n < 1 || $m < 1) {
        return -1;
    }

    $last = 0;
    for ($i = 2; $i <= $n; $i++) {
        $last = ($last + $m) % $i;
    }

    return $last;
}

var_dump(lastRemaining(10, 17));