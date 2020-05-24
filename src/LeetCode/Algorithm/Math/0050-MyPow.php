<?php
/**
 * User: whh935
 * Date: 2020/5/11 22:15
 * Desc: Pow(x, n)-https://leetcode-cn.com/problems/powx-n/
 *      实现 pow(x, n) ，即计算 x 的 n 次幂函数。
 *      示例 1:
 *          输入: 2.00000, 10
 *          输出: 1024.00000
 *      示例 2:
 *          输入: 2.10000, 3
 *          输出: 9.26100
 *      示例 3:
 *          输入: 2.00000, -2
 *          输出: 0.25000
 *          解释: 2-2 = 1/22 = 1/4 = 0.25
 *      说明:
 *          -100.0 < x < 100.0
 *          n 是 32 位有符号整数，其数值范围是 [−2^31, 2^31 − 1] 。
 */

class Solution
{
    /**
     * @param $x
     * @param $n
     * @return float|int
     */
    function myPow($x, $n)
    {
        if (abs($x) < 0.000001 && 0 == $n) {
            return 0;
        }

        $abs_n = ($n < 0) ? -$n : $n;
        $result = $this->myPowWithUnsignedN($x, $abs_n);
        if ($n < 0) {
            $result = 1.0 / $result;
        }

        return $result;
    }

    /**
     * @param $x
     * @param $n
     * @return int
     */
    function myPowWithUnsignedN($x, $n)
    {
        if (0 == $n) {
            return 1;
        }
        if (1 == $n) {
            return $x;
        }

        $result = $this->myPowWithUnsignedN($x, $n >> 1);
        $result *= $result;
        if ($n & 1 == 1) {
            $result *= $x;
        }

        return $result;
    }
}

$solution = new Solution();
$x = 2.10000;
$n = 3;
var_dump($solution->myPow($x, $n));
