<?php
/**
 * User: whh935
 * Date: 2020/3/19 22:39
 * Desc: 程序员面试宝典01.02题-https://leetcode-cn.com/problems/check-permutation-lcci/
 *      判定是否互为字符重排，给定两个字符串 s1 和 s2，请编写一个程序，
 *      确定其中一个字符串的字符重新排列后，能否变成另一个字符串。
 *      如输入s1 = "abc", s2 = "bca"，输出 true
 */

/**
 * @param $s1
 * @param $s2
 * @return bool
 */
function checkPermutation($s1, $s2)
{
    $s1_len = strlen($s1);
    $s2_len = strlen($s2);
    if ($s1_len != $s2_len) {
        return false;
    }

    $s1_set = [];
    for ($i = 0; $i < $s1_len; $i++) {
        if (!isset($s1_set[$s1[$i]])) {
            $s1_set[$s1[$i]] = 1;
        } else {
            $s1_set[$s1[$i]]++;
        }
    }

    for ($j = 0; $j < $s2_len; $j++) {
        if (!isset($s1_set[$s2[$j]])) {
            return false;
        } else {
            $s1_set[$s2[$j]]--;
        }
    }

    foreach ($s1_set as $value) {
        if ($value > 0) {
            return false;
        }
    }

    return true;
}

$s1 = 'abc';
$s2 = 'bca';
var_dump(checkPermutation($s1, $s2));

