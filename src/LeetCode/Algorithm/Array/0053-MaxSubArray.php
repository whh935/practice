<?php
/**
 * User: whh935
 * Date: 2020/5/5 10:59
 * Desc: 最大子序和-https://leetcode-cn.com/problems/maximum-subarray/
 *      给定一个整数数组 nums ，找到一个具有最大和的连续子数组（子数组最少包含一个元素），返回其最大和。
 *      示例:
 *          输入: [-2,1,-3,4,-1,2,1,-5,4],
 *          输出: 6
 *          解释: 连续子数组 [4,-1,2,1] 的和最大，为 6。
 */

class Solution
{
    /**
     * @desc 贪心法 O(n)
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
            if ($max <= 0) {
                $max = $nums[$i];
            } else {
                $max += $nums[$i];
            }

            $ans = max($ans, $max);
        }

        return $ans;
    }

    /**
     * 动态规划
     * dp[i] = max(dp[i-1]+nums[i], nums[i])
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