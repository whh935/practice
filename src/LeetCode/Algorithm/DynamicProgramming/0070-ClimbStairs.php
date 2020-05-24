<?php
/**
 * User: whh935
 * Date: 2020/4/4 16:55
 * Desc: LeetCode第70题-https://leetcode-cn.com/problems/climbing-stairs/
 *      假设你正在爬楼梯。需要 n 阶你才能到达楼顶。
 *      每次你可以爬 1 或 2 个台阶。你有多少种不同的方法可以爬到楼顶呢？
 *      注意：给定 n 是一个正整数。
 *      输入： 2
 *      输出： 2
 *      解释： 有两种方法可以爬到楼顶。
 *          1.  1 阶 + 1 阶
 *          2.  2 阶
 */

class Solution
{
    /**
     * 斐波那契递推公式：f(n)=f(n-1)+f(n-2)
     * @param $n
     * @return int
     */
    function climbStairs1($n)
    {
        if ($n <= 2) {
            return $n;
        }

        $one = 1;
        $two = 2;
        $ans = 0;
        for ($i = 3; $i <= $n; $i++) {
            $ans = $one + $two;
            $one = $two;
            $two = $ans;
        }

        return $ans;
    }

    /**
     * 动态规划状态转移方程：dp[i]=dp[i-1]+dp[i-2]
     * @param $n
     * @return mixed
     */
    function climbStairs2($n)
    {
        if ($n <= 2) {
            return $n;
        }

        $dp[1] = 1;
        $dp[2] = 2;
        for ($i = 3; $i <= $n; $i++) {
            $dp[$i] = $dp[$i - 1] + $dp[$i - 2];
        }

        return $dp[$n];
    }
}

$solution = new Solution();
$n = 3;
var_dump($solution->climbStairs1($n));
var_dump($solution->climbStairs2($n));
