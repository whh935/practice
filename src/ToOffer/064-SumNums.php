<?php
/**
 * User: whh935
 * Date: 2020/3/8 23:06
 * Desc: 剑指offer面试题64-https://leetcode-cn.com/problems/qiu-12n-lcof/
 *      求 1+2+...+n ，
 *      要求不能使用乘除法、for、while、if、else、switch、case等关键字及条件判断语句（A?B:C）。
 */

class Solution
{
    /**
     * && 的短路特性
     * A 为 true，则返回表达式 B 的 bool 值
     * A 为 false，则返回 false
     * @param $n
     * @return mixed
     */
    function sumNums($n)
    {
        $n > 0 && ($n += $this->sumNums($n - 1));
        return $n;
    }
}

$solution = new Solution();
$n = 6;
var_dump($solution->sumNums($n));
