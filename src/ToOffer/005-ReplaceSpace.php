<?php
/**
 * User: whh935
 * Date: 2019/7/8 15:53
 * Desc: 剑指offer面试题05-https://leetcode-cn.com/problems/ti-huan-kong-ge-lcof/
 *      替换空格:请实现一个函数，把字符串 s 中的每个空格替换成"%20"。
 *      示例 1：输入：s = "We are happy."，输出："We%20are%20happy."
 */

class Solution
{
    /**
     * 先统计空格个数，再从尾到头替换
     * @param $s
     * @return string
     */
    function replaceSpace($s)
    {
        $original_length = strlen($s);
        if ($original_length <= 0) {
            return '';
        }

        $blanks = 0;
        for ($i = 0; $i < $original_length; $i++) {
            if ($s[$i] == ' ') {
                $blanks++;
            }
        }

        if ($blanks <= 0) {
            return $s;
        }

        $new_length = ($original_length + $blanks * 2) - 1;
        for ($i = $original_length - 1; $i >= 0; $i--) {
            if ($s[$i] == ' ') {
                $s[$new_length--] = '0';
                $s[$new_length--] = '2';
                $s[$new_length--] = '%';
            } else {
                $s[$new_length--] = $s[$i];
            }
        }

        return $s;
    }
}

$solution = new Solution();
$s = 'We are happy.';
var_dump($solution->replaceSpace($s));
