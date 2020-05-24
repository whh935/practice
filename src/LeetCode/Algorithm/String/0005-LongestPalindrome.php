<?php
/**
 * User: whh935
 * Date: 2020/5/11 09:48
 * Desc: 最长回文子串-https://leetcode-cn.com/problems/longest-palindromic-substring/
 *      给定一个字符串 s，找到 s 中最长的回文子串。你可以假设 s 的最大长度为 1000。
 *      示例 1：
 *          输入: "babad"
 *          输出: "bab"
 *          注意: "aba" 也是一个有效答案。
 *      示例 2：
 *          输入: "cbbd"
 *          输出: "bb"
 */

class Solution
{
    /**
     * 中心扩展算法
     * @param $s
     * @return string
     */
    function longestPalindrome($s)
    {
        $len = strlen($s);
        if ($len < 2) {
            return $s;
        }

        $start = $end = 0;
        for ($i = 0; $i < $len; $i++) {
            $len1 = $this->expandAroundCenter($s, $i, $i);
            $len2 = $this->expandAroundCenter($s, $i, $i + 1);
            $max = max($len1, $len2);
            if ($max > ($end - $start + 1)) {
                $start = $i - intval(($max - 1) / 2);
                $end = $i + intval($max / 2);
            }
        }

        return substr($s, $start, $end - $start + 1);
    }

    /**
     * @param $s
     * @param $left
     * @param $right
     * @return mixed
     */
    function expandAroundCenter($s, $left, $right)
    {
        while ($left >= 0 && $right < strlen($s) && $s[$left] == $s[$right]) {
            $left--;
            $right++;
        }

        return $right - $left - 1;
    }
}

$solution = new Solution();
$s = 'babad';
var_dump($solution->longestPalindrome($s));
