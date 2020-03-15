<?php
/**
 * User: whh935
 * Date: 2020/3/14 16:48
 * Desc: LeetCode第239题-https://leetcode-cn.com/problems/sliding-window-maximum/
 *      给定一个数组 nums，有一个大小为 k 的滑动窗口从数组的最左侧移动到数组的最右侧。
 *      你只可以看到在滑动窗口内的 k 个数字。滑动窗口每次只向右移动一位。返回滑动窗口中的最大值。
 *      输入: nums = [1,3,-1,-3,5,3,6,7], 和 k = 3，输出: [3,3,5,5,6,7]
 */

/**
 * 最简单直接的方法是遍历每个滑动窗口，找到每个窗口的最大值。
 * 一共有 N - k + 1 个滑动窗口，每个有 k 个元素
 * 于是算法的时间复杂度为 O(Nk)，空间复杂度为 O(N−k+1)，表现较差。
 * @param $nums
 * @param $k
 * @return array
 */
function maxSlidingWindow1($nums, $k)
{
    $length = count($nums);
    if (empty($length) || $k <= 0) {
        return [];
    }

    $sliding_window_nums = $length - $k + 1;
    $ans = [];
    for ($i = 0; $i < $sliding_window_nums; $i++) {
        $ans[] = max(array_slice($nums, $i, $k));
    }

    return $ans;
}

$nums = [1,3,-1,-3,5,3,6,7];
$k = 3;
var_dump(maxSlidingWindow1($nums, $k));