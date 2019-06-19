<?php
/**
 * User: whh935
 * Date: 2019/6/18 21:13
 * Desc: LeetCode第167题-https://leetcode.com/problems/two-sum-ii-input-array-is-sorted/
 *      给定一个整数且已升序数组，从中找出两个数的下标，使得它们的和等于一个特定的数字。
 *      可以假设题目有唯一解。
 */

function twoSum($numbers, $target)
{
    $length = count($numbers);
    if ($length <= 1) {
        return [];
    }
    
    $left  = 0;
    $right = $length - 1;
    while ($left <= $right) {
        $sum = $numbers[$left] + $numbers[$right];
        if ($sum == $target) {
            return [$left + 1, $right + 1];
        } elseif ($sum > $target) {
            $right--;
        } else {
            $left++;
        }
    }

    return [];
}

$arr = [2, 7, 11, 15];
var_dump(twoSum($arr, 9));exit;
