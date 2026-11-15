<?php
/**
 * User: whh935
 * Date: 2018/5/23 23:13
 * Desc: 两数之和-https://leetcode-cn.com/problems/two-sum/
 *      给定一个整数数组 nums 和一个整数目标值 target，请你在该数组中找出和为目标值 target 的那两个整数，并返回它们的数组下标。
 *      你可以假设每种输入只会对应一个答案。但是，数组中同一个元素不能使用两遍。
 *      示例:
 *          给定 nums = [2, 7, 11, 15], target = 9
 *          因为 nums[0] + nums[1] = 2 + 7 = 9
 *          所以返回 [0, 1]
 */

class Solution
{
    /**
     * @param $nums
     * @param $target
     * @return array
     */
    function twoSum($nums, $target)
    {
        $idxByVal = [];
        foreach ($nums as $idx => $val) {
            if (isset($idxByVal[$target - $val])) {
                return [$idxByVal[$target - $val], $idx];
            }

            $idxByVal[$val] = $idx;
        }

        return [];
    }
}

$solution = new Solution();
$nums = [2, 7, 11, 15];
var_dump($solution->twoSum($nums, 9));
