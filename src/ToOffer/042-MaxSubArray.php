<?php
/**
 * User: whh935
 * Date: 2020/3/3 17:23
 * Desc: 剑指offer面试题42-https://leetcode-cn.com/problems/lian-xu-zi-shu-zu-de-zui-da-he-lcof/
 *      连续子数组的最大和
 *      输入一个整型数组，数组里有正数也有负数。数组中的一个或连续多个整数组成一个子数组。
 *      求所有子数组的和的最大值。要求时间复杂度为O(n)。
 */

class Solution
{
    /**
     * @desc 贪心法 O(n)
     * 当叠加的和小于0时，就从下一个数重新开始，
     * 同时更新最大和的值(最大值可能为其中某个值)，
     * 当叠加和大于0时，将下一个数值加入和中，
     * 同时更新最大和的值，依此继续。
     *
     * @param $nums
     * @return int|mixed
     */
    function maxSubArray1($nums)
    {
        if (empty($nums)) {
            return 0;
        }

        $ans = $max = $nums[0];
        $len = count($nums);
        for ($i = 1; $i < $len; $i++) {
            // 当sum小于等于0时，就从下一个数重新开始
            // 同时更新每次叠加的最大值
            if ($max <= 0) {
                $max = $nums[$i];
            } else {// 和大于0时
                $max += $nums[$i];
            }

            // 不断更新子串的最大值
            $ans = max($ans, $max);
        }

        return $ans;
    }

    /**
     * 动态规划
     * @param $nums
     * @return int|mixed
     */
    function maxSubArray2($nums)
    {
        if (empty($nums)) {
            return 0;
        }

        $len = count($nums);
        $dp[0] = $ans = $nums[0];
        for ($i = 1; $i < $len; $i++) {
            $dp[$i] = $nums[$i];
            if ($dp[$i - 1] > 0) {
                $dp[$i] += $dp[$i - 1];
            }

            $ans = max($ans, $dp[$i]);
        }

        return $ans;
    }

    /**
     * 原地动态规划
     * @param $nums
     * @return int|mixed
     */
    function maxSubArray3($nums)
    {
        if (empty($nums)) {
            return 0;
        }

        $len = count($nums);
        for ($i = 1; $i < $len; $i++) {
            if ($nums[$i - 1] > 0) {
                $nums[$i] += $nums[$i - 1];
            }
        }

        return max($nums);
    }
}

$solution = new Solution();
$nums = [-2,1,-3,4,-1,2,1,-5,4];
var_dump($solution->maxSubArray1($nums));
var_dump($solution->maxSubArray2($nums));
var_dump($solution->maxSubArray3($nums));
