<?php
/**
 * User: whh935
 * Date: 2020/4/4 22:28
 * Desc: LeetCode第179题-https://leetcode-cn.com/problems/largest-number/
 *      给定一组非负整数，重新排列它们的顺序使之组成一个最大的整数。
 *      如输入: [10,2]，输出: 210
 *      如输入: [3,30,34,5,9]，输出: 9534330
 *      说明: 输出结果可能非常大，所以你需要返回一个字符串而不是整数。
 */

/**
 * @param $nums
 * @return string
 */
function largestNumber($nums)
{
    $strings = array_map('strval', $nums);
    usort($strings, 'compare');

    if ($strings[0] == '0') {
        return '0';
    }

    return implode('', $strings);
}

/**
 * 对比两个字符串大小
 * @param $s1
 * @param $s2
 * @return mixed
 */
function compare($s1, $s2)
{
    return $s1 . $s2 < $s2 . $s1;
}

$nums = [3,30,34,5,9];
var_dump(largestNumber($nums));