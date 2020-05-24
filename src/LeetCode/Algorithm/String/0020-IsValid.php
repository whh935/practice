<?php
/**
 * User: whh935
 * Date: 2020/3/27 09:46
 * Desc: 有效的括号-https://leetcode-cn.com/problems/valid-parentheses/
 *      给定一个只包括 '('，')'，'{'，'}'，'['，']' 的字符串，判断字符串是否有效。
 *      有效字符串需满足：
 *          1.左括号必须用相同类型的右括号闭合。
 *          2.左括号必须以正确的顺序闭合。
 *      注意空字符串可被认为是有效字符串。
 *      示例 1:
 *          输入: "()"
 *          输出: true
 *      示例 2:
 *          输入: "()[]{}"
 *          输出: true
 *      示例 3:
 *          输入: "(]"
 *          输出: false
 *      示例 4:
 *          输入: "([)]"
 *          输出: false
 *      示例 5:
 *          输入: "{[]}"
 *          输出: true
 */

class Solution
{
    /**
     * @param $s
     * @return bool
     */
    function isValid($s)
    {
        $len = strlen($s);
        if ($len == 0) {
            return true;
        }
        if ($len % 2 == 1) {
            return false;
        }

        $stack = [];
        for ($i = 0; $i < $len; $i++) {
            if (in_array($s[$i], ['(', '{', '['])) {
                array_push($stack, $s[$i]);
            } else {
                $char = array_pop($stack);
                if (($s[$i] == ')' && $char != '(')
                    || ($s[$i] == '}' && $char != '{')
                    || ($s[$i] == ']' && $char != '[')
                ) {
                    return false;
                }
            }
        }

        return count($stack) == 0;
    }
}

$solution = new Solution();
$s = '()';
var_dump($solution->isValid($s));
