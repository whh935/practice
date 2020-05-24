<?php
/**
 * User: whh935
 * Date: 2020/4/4 11:30
 * Desc: 整数反转-https://leetcode-cn.com/problems/reverse-integer/
 *      给出一个 32 位的有符号整数，你需要将这个整数中每位上的数字进行反转。
 *      输入: 123，输出: 321
 *      注意：假设我们的环境只能存储得下 32 位的有符号整数，则其数值范围为 [−2^31, 2^31 − 1]。
 *      请根据这个假设，如果反转后整数溢出那么就返回 0。
 */

class Solution
{
    /**
     * @param $x
     * @return int
     */
    function reverse($x)
    {
        $ans = 0;
        $max = pow(2, 31) - 1;//int最大值 2^31-1=2147483647
        $min = -pow(2, 31);//int最小值 -2^31=-2147483648
        while ($x != 0) {
            $pop = $x % 10;
            if ($ans > (int)($max / 10) || ($ans == (int)($max / 10) && $pop > 7)) {
                return 0;
            }
            if ($ans < (int)($min / 10) || ($ans == (int)($min / 10) && $pop < -8)) {
                return 0;
            }

            $ans = $ans * 10 + $pop;
            $x = (int)($x / 10);
        }

        return $ans;
    }
}

$solution = new Solution();
$x = 123;
//$x = -123456789999999;
$ans = $solution->reverse($x);
var_dump($ans);
