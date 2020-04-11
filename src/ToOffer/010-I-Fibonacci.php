<?php
/**
 * User: whh935
 * Date: 2019/7/8 17:08
 * Desc: 剑指offer面试题10-I- https://leetcode-cn.com/problems/fei-bo-na-qi-shu-lie-lcof/
 *      斐波那契数列
 *      写一个函数，输入 n ，求斐波那契（Fibonacci）数列的第 n 项。斐波那契数列的定义如下：
 *      F(0) = 0,   F(1) = 1
 *      F(N) = F(N - 1) + F(N - 2), 其中 N > 1.
 *      斐波那契数列由 0 和 1 开始，之后的斐波那契数就是由之前的两数相加而得出。
 */

class Solution
{
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

        return $this->fibonacciByRecursive($n - 1) + $this->fibonacciByRecursive($n - 2);
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
}

$solution = new Solution();
$n = 10;
var_dump($solution->fibonacciByRecursive($n));
var_dump($solution->fibonacciByNoRecursive($n));
