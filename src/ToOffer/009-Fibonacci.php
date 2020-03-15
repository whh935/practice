<?php
/**
 * User: whh935
 * Date: 2019/7/8 17:08
 * Desc: 剑指offer面试题9-斐波那契数列
 */

/**
 * 递归实现
 * @param $n
 * @return int
 */
function fibonacciByRecursive($n)
{
    if ($n <= 0) {
        return 0;
    }
    if (1 == $n || 2 == $n) {
        return 1;
    }

    return fibonacciByRecursive($n - 1) + fibonacciByRecursive($n - 2);
}

/**
 * 递推实现
 * @param $n
 * @return int
 */
function fibonacciByNoRecursive($n)
{
    if ($n <= 0) {
        return 0;
    }
    if (1 == $n || 2 == $n) {
        return 1;
    }

    $fi_one = 1;
    $fi_two = 1;
    $fi_n   = 0;
    for ($i = 3; $i <= $n; $i++) {
        $fi_n   = $fi_one + $fi_two;
        $fi_one = $fi_two;
        $fi_two = $fi_n;
    }

    return $fi_n;
}

$n = 10;
var_dump(fibonacciByRecursive($n));
var_dump(fibonacciByNoRecursive($n));
exit;
