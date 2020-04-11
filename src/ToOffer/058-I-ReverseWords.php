<?php
/**
 * User: whh935
 * Date: 2020/4/7 22:50
 * Desc: 剑指offer面试题58-I-https://leetcode-cn.com/problems/fan-zhuan-dan-ci-shun-xu-lcof/
 *      翻转单词顺序
 *      输入一个英文句子，翻转句子中单词的顺序，但单词内字符的顺序不变。
 *      为简单起见，标点符号和普通字母一样处理。
 *      例如输入字符串"I am a student. "，则输出"student. a am I"。
 */

class Solution
{
    /**
     * 使用库函数两次反转
     * @param $s
     * @return string
     */
    function reverseWords1($s)
    {
        $s = strrev(trim($s));

        $ans = [];
        $s_arr = array_filter(explode(' ', $s));
        foreach ($s_arr as $s_val) {
            $ans[] = strrev($s_val);
        }

        return implode(' ', $ans);
    }

    /**
     * 两次反转
     * @param $s
     * @return string
     */
    function reverseWords2($s)
    {
        $s = trim($s);
        $len = strlen($s);
        $this->reverse($s, 0, $len - 1);

        $i = $j = 0;
        while ($i <= $len - 1) {
            if ($s[$i] == ' ') {
                $i++;
                $j++;
            } elseif ($j == $len || $s[$j] == ' ') {
                $this->reverse($s, $i, --$j);
                $i = ++$j;
            } else {
                $j++;
            }
        }

        return $s;
    }

    /**
     * @param $s
     * @param $start
     * @param $end
     */
    function reverse(&$s, $start, $end)
    {
        while ($start < $end) {
            $tmp = $s[$start];
            $s[$start] = $s[$end];
            $s[$end] = $tmp;
            $start++;
            $end--;
        }
    }
}

$solution = new Solution();
$s = 'a good   example';
//$s = '  hello world!  ';
//$s = 'a good   example';
var_dump($solution->reverseWords1($s));
var_dump($solution->reverseWords2($s));
