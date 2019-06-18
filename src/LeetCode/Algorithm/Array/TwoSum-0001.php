<?php
/**
 * User: whh935
 * Date: 2018/5/23 23:13
 * Desc: LeetCode第1题-https://leetcode.com/problems/two-sum/
 *      给定一个整数数组，从中找出两个数的下标，使得它们的和等于一个特定的数字。
 *      可以假设题目有唯一解。
 */

function twoSum($nums, $target)
{
    $idx = [];
    foreach ($nums as $key => $value) {
        if (isset($idx[$target - $value])) {
            return [$idx[$target - $value], $key];
        }

        $idx[$value] = $key;
    }

    return [];
}

$arr = [2, 7, 11, 15];
var_dump(twoSum($arr, 9));exit;