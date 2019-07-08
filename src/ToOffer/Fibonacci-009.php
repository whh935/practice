<?php
/**
 * User: whh935
 * Date: 2019/7/8 17:08
 * Desc: 剑指offer面试题9-斐波那契数列
 */

function FibonacciByRecursive($n)
{
    if ($n <= 0) {
        return 0;   
    }
    if (1 == $n || 2 == $n) {
        return 1;
    }

    return FibonacciByRecursive($n - 1) + FibonacciByRecursive($n - 2);
}

function FibonacciByNoRecursive($n)
{
    if ($n <= 0) {
        return 0;
    }
    if (1 == $n || 2 == $n) {
        return 1;
    }

    $fiOne = 1;
    $fiTwo = 1;
    $fiN   = 0;
    for ($i = 3; $i <= $n; $i++) {
        $fiN   = $fiOne + $fiTwo;
        $fiOne = $fiTwo;
        $fiTwo = $fiN;
    }

    return $fiN;
}

$n = 8;
var_dump(FibonacciByRecursive($n));
var_dump(FibonacciByNoRecursive($n));
exit;
