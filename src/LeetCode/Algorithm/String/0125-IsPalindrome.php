<?php
/**
 * User: whh935
 * Date: 2019/6/19 17:10
 * Desc: 验证回文串-https://leetcode-cn.com/problems/valid-palindrome/
 *      给定一个字符串，验证它是否是回文串，只考虑字母和数字字符，可以忽略字母的大小写。
 *      本题中，我们将空字符串定义为有效的回文串。
 *      示例 1:
 *          输入: "A man, a plan, a canal: Panama"
 *          输出: true
 *      示例 2:
 *          输入: "race a car"
 *          输出: false
 */

class Solution
{
    /**
     * @param $s
     * @return bool
     */
    function isPalindrome($s)
    {
        $left  = 0;
        $right = strlen($s) - 1;

        while ($left < $right) {
            while ($left < $right && !ctype_alnum($s[$left])) {
                $left++;
            }
            while ($left < $right && !ctype_alnum($s[$right])) {
                $right--;
            }
            if (strtolower($s[$left]) != strtolower($s[$right])) {
                return false;
            }

            $left++;
            $right--;
        }

        return true;
    }
}

$solution = new Solution();
$s = 'A man, a plan, a canal: Panama';
//$s = '.,';
var_dump($solution->isPalindrome($s));exit;
