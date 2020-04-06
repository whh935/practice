<?php
/**
 * User: whh935
 * Date: 2020/3/30 15:11
 * Desc: LeetCode第8题-https://leetcode-cn.com/problems/string-to-integer-atoi/
 *      请你来实现一个 atoi 函数，使其能将字符串转换成整数。
 *      首先，该函数会根据需要丢弃无用的开头空格字符，直到寻找到第一个非空格的字符为止。
 *      当我们寻找到的第一个非空字符为正或者负号时，则将该符号与之后面尽可能多的连续数字组合起来，作为该整数的正负号；
 *      假如第一个非空字符是数字，则直接将其与之后连续的数字字符组合起来，形成整数。
 *      该字符串除了有效的整数部分之后也可能会存在多余的字符，这些字符可以被忽略，它们对于函数不应该造成影响。
 *      注意：假如该字符串中的第一个非空格字符不是一个有效整数字符、字符串为空或字符串仅包含空白字符时，则你的函数不需要进行转换。
 *      在任何情况下，若函数不能进行有效的转换时，请返回 0。
 *      说明：假设我们的环境只能存储 32 位大小的有符号整数，那么其数值范围为 [−2^31,  2^31 − 1]。
 *      如果数值超过这个范围，请返回  INT_MAX (2^31 − 1) 或 INT_MIN (−2^31) 。
 *      示例 1: 输入: "42"，输出: 42
 *      示例 2: 输入: "   -42"，输出: -42，
 *          解释: 第一个非空白字符为 '-', 它是一个负号。我们尽可能将负号与后面所有连续出现的数字组合起来，最后得到 -42 。
 *      示例 3: 输入: "4193 with words"，输出: 4193
 *          解释: 转换截止于数字 '3' ，因为它的下一个字符不为数字。
 *      示例 4: 输入: "words and 987"，输出: 0
 *          解释: 第一个非空字符是 'w', 但它不是数字或正、负号。因此无法执行有效的转换。
 *      示例 5: 输入: "-91283472332"，输出: -2147483648
 *          解释: 数字 "-91283472332" 超过 32 位有符号整数范围。因此返回 INT_MIN (−2^31) 。
 */

class Solution
{
    /**
     * @param $str
     * @return int|number
     */
    function myAtoi($str)
    {
        $len = strlen($str);
        $index = 0;

        //去除前导空格
        while ($index < $len) {
            if ($str[$index] != ' ') {
                break;
            }
            $index++;
        }

        if ($index == $len) {
            return 0;
        }

        //第 1 个字符如果是符号，判断合法性，并记录正负
        $sign = 1;
        $first_char = $str[$index];
        if ($first_char == '+') {
            $index++;
        } elseif ($first_char == '-') {
            $index++;
            $sign = -1;
        }

        $res = 0;
        $max = pow(2, 31) - 1;
        $min = -pow(2,31);
        while ($index < $len) {
            $curr_char = $str[$index];
            //判断合法性
            if ($curr_char > '9' || $curr_char < '0') {
                break;
            }

            //环境只能存储 32 位大小的有符号整数，因此，需要提前判断乘以 10 以后是否越界
            if ($res > (int)($max / 10) || ($res == (int)($max / 10) && ($curr_char - '0') > $max % 10)) {
                return $max;
            }
            if ($res < (int)($min / 10) || ($res == (int)($min / 10) && ($curr_char - '0') > -($min % 10))) {
                return $min;
            }

            //每一步都把符号位乘进去
            $res = $res *  10 + $sign * ($curr_char - '0');
            $index++;
        }

        return $res;
    }
}

$solution = new Solution();
$str = '42';
//$str = '2147483648';
var_dump($solution->myAtoi($str));
