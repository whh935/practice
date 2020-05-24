<?php
/**
 * User: whh935
 * Date: 2020/5/19 22:35
 * Desc: 验证回文字符串 Ⅱ-https://leetcode-cn.com/problems/valid-palindrome-ii/
 *      给定一个非空字符串 s，最多删除一个字符。判断是否能成为回文字符串。
 *      示例 1:
 *          输入: "aba"
 *          输出: True
 *      示例 2:
 *          输入: "abca"
 *          输出: True
 *          解释: 你可以删除c字符。
 *      注意:
 *          字符串只包含从 a-z 的小写字母。字符串的最大长度是50000。
 */

class Solution
{
    /**
     * @param $s
     * @return bool
     */
    function validPalindrome($s)
    {
        $len = strlen($s);
        for ($i = 0, $j = $len - 1;$i < $len; $i++, $j--) {
            if ($s[$i] != $s[$j]) {
                return $this->isPalindrome($s, $i + 1, $j)
                    || $this->isPalindrome($s, $i, $j - 1);
            }
        }

        return true;
    }

    /**
     * @param $s
     * @param $left
     * @param $right
     * @return bool
     */
    function isPalindrome($s, $left, $right)
    {
        while ($left < $right) {
            if ($s[$left] != $s[$right]) {
                return false;
            }
            $left++;
            $right--;
        }

        return true;
    }
}

$solution = new Solution();
$s = 'abca';
var_dump($solution->validPalindrome($s));
