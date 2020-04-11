<?php
/**
 * User: whh935
 * Date: 2019/7/9 16:07
 * Desc: 剑指offer面试题16-https://leetcode-cn.com/problems/shu-zhi-de-zheng-shu-ci-fang-lcof/
 *      数值的整数次方：实现函数double Power(double base, int exponent)，
 *      求base的exponent次方。不得使用库函数，同时不需要考虑大数问题。
 */

class Solution
{
    /**
     * @param $base
     * @param $exponent
     * @return float|int
     */
    function myPower($base, $exponent)
    {
        if (!is_int($exponent)) {
            echo '指数非整数' . PHP_EOL;
            return 0;
        }
        if (abs($base) < 0.000001 && 0 == $exponent) {
            return 0;
        }

        $abs_exponent = $exponent;
        if ($exponent < 0) {
            $abs_exponent = -$exponent;
        }

        $result = $this->powerWithUnsignedExponent($base, $abs_exponent);
        if ($exponent < 0) {
            $result = 1.0 / $result;
        }

        return $result;
    }

    /**
     * @param $base
     * @param $exponent
     * @return int
     */
    function powerWithUnsignedExponent($base, $exponent)
    {
        if (0 == $exponent) {
            return 1;
        }
        if (1 == $exponent) {
            return $base;
        }

        $result = $this->powerWithUnsignedExponent($base, $exponent >> 1);
        $result *= $result;
        if ($exponent & 1 == 1) {//判断是否为奇数
            $result *= $base;
        }

        return $result;
    }
}

$solution = new Solution();
$base = 2.1;
$exponent = 3;
var_dump($solution->myPower($base, $exponent));

