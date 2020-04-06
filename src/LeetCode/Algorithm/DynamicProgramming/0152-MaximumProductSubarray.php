<?php
/**
 * User: whh935
 * Date: 2019/5/29 17:51
 * Desc: LeetCode第152题-https://leetcode-cn.com/problems/maximum-product-subarray/
 *      寻找最大乘积的连续子数组
 */

class Solution
{
    /**
     * 思路：
     *  状态dp_max[i]表示到第i个元素最大乘积，dp_min[i]表示到第i个元素最小乘积
     *  状态转移方程
     *      dp_max[i] = max(nums[i], dp_max[i - 1] * nums[i], dp_min(i - 1) * nums[i]);
     *      dp_min[i] = min(nums[i], dp_max[i - 1] * nums[i], dp_min(i - 1) * nums[i]);
     *  初始化
     *      dp_max[0] = dp_min[0] = nums[0]
     *  最大值max需要单独记录，并不是dp_max[count(nums) - 1]
     * @param $nums
     * @return int|mixed
     */
    function maxProduct($nums)
    {
        if (empty($nums)) {
            return 0;
        }

        $dp_max[0] = $dp_min[0] = $nums[0];
        $max = $nums[0];
        $len = count($nums);
        for ($i = 1; $i < $len; $i++) {
            $dp_max[$i] = max($nums[$i], $dp_max[$i - 1] * $nums[$i], $dp_min[$i - 1] * $nums[$i]);
            $dp_min[$i] = min($nums[$i], $dp_max[$i - 1] * $nums[$i], $dp_min[$i - 1] * $nums[$i]);

            $max = max($max, $dp_max[$i]);
        }

        return $max;
    }
}

$solution = new Solution();
$nums = [2,3,-2,4];
//$nums = [-2,0,-1];
//$nums = [-2,3,-4];
$result = $solution->maxProduct($nums);
var_dump($result);