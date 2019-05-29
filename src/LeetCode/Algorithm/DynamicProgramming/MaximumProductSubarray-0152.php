<?php
/**
 * User: whh935
 * Date: 2019/5/29 17:51
 * Desc: LeetCode第152题-https://leetcode.com/problems/maximum-product-subarray/
 *      寻找最大乘积的连续子数组
 */

/**
 * 思路：
 * 保存乘积最大的值的同时，也要保存最小值（乘负数就是最小），然后比较最小值乘当前值、最大值乘当前值、当前值三者之间的最大和最小值，最大值和全局值比较
 * maxFi=Max(maxFi−1∗Ai,Ai,minFi−1∗Ai);
 * minFi=Min(minFi−1∗Ai,Ai,maxFi−1∗Ai);
 * global=Max(maxFi,global);
 */
function maxProduct($nums)
{
    if (empty($nums)) {
        return 0;
    }

    $length = count($nums);
    if ($length == 1) {
        return $nums[0];
    }

    $curr_max   = $nums[0];
    $curr_min   = $nums[0];
    $global_max = $nums[0];

    for ($i = 1; $i < $length; $i++) {
        $pre_max    = $curr_max;
        $curr_max   = max(max($pre_max * $nums[$i], $nums[$i]), $curr_min * $nums[$i]);
        $curr_min   = min(min($curr_min * $nums[$i], $nums[$i]), $pre_max * $nums[$i]);
        $global_max = max($global_max, $curr_max);
    }

    return $global_max;
}

//$nums = [2,3,-2,4];
//$nums = [-2,0,-1];
$nums = [-2,3,-4];
$result = maxProduct($nums);
var_dump($result);