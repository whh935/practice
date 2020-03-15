<?php
/**
 * User: whh935
 * Date: 2020/3/3 17:23
 * Desc: 剑指offer面试题31
 *      连续子数组的最大和
 */

/**
 * @desc 贪心法 O(n)
 * 当叠加的和小于0时，就从下一个数重新开始，
 * 同时更新最大和的值(最大值可能为其中某个值)，
 * 当叠加和大于0时，将下一个数值加入和中，
 * 同时更新最大和的值，依此继续。
 * @param $nums
 * @return int|mixed
 */
function maxSubArray($nums)
{
    if (empty($nums)) {
        return 0;
    }

    $res = $max = $nums[0];
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
        $res = max($res, $max);
    }

    return $res;
}

$nums = [-2,1,-3,4,-1,2,1,-5,4];
var_dump(maxSubArray($nums));exit;