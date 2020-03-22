<?php
/**
 * User: whh935
 * Date: 2020/3/21 26:40
 * Desc: 程序员面试宝典01.05题-https://leetcode-cn.com/problems/one-away-lcci/
 *      字符串有三种编辑操作:插入一个字符、删除一个字符或者替换一个字符。
 *      给定两个字符串，编写一个函数判定它们是否只需要一次(或者零次)编辑。
 */

/**
 * 双指针
 * 1）如果两个字符串长度差>1，则肯定是false
 * 2）当字符串长度差等于0或1时，如果相同位置存在两个元素不同，则返回false
 *
 * @param $first
 * @param $second
 * @return bool
 */
function oneEditAway($first, $second)
{
    $len1 = strlen($first);
    $len2 = strlen($second);
    if (abs($len1 - $len2) > 1) {
        return false;
    }

    $diff_cnt = 0;
    $i = $j = 0;
    while ($i < $len1 && $j < $len2) {
        if ($first[$i] != $second[$j]) {
            $diff_cnt++;
            if ($len1 == $len2) {
                $i++;
                $j++;
            } elseif ($len1 > $len2) {
                $i++;
            } else {
                $j++;
            }
        } else {
            $i++;
            $j++;
        }

        if ($diff_cnt > 1) {
            return false;
        }
    }

    return true;
}

$first = 'abc';
$second = 'ac';
var_dump(oneEditAway($first, $second));
