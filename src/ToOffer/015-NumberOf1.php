<?php
/**
 * User: whh935
 * Date: 2019/7/8 20:09
 * Desc: 剑指offer面试题15-https://leetcode-cn.com/problems/er-jin-zhi-zhong-1de-ge-shu-lcof/
 *      二进制中1的个数
 */

class Solution
{
    /**
     * 把一个整数减去1，再与原整数做按位与运算，会把该整数最右边一个1变成0
     * @param $n
     * @return int
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
}

$solution = new Solution();
$n = 7;
var_dump($solution->numberOf1($n));
