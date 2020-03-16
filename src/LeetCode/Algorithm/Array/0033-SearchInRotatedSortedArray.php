<?php
/**
 * User: whh935
 * Date: 2019/4/17 18:38
 * Desc: LeetCode第33题-https://leetcode-cn.com/problems/search-in-rotated-sorted-array/
 *      在旋转排序数组中查找一个数，存在返回下标，否则返回-1
 */

/**
 * 题目要求 O(logN)的时间复杂度，基本可以断定本题是需要使用二分查找，怎么分是关键。
 * 由于题目说数字了无重复，举个例子：
 * 1 2 3 4 5 6 7 可以大致分为两类，
 * 第一类 2 3 4 5 6 7 1 这种，也就是 nums[start] <= nums[mid]。此例子中就是 2 <= 5。
 * 这种情况下，前半部分有序。因此如果 nums[start] <=target<nums[mid]，则在前半部分找，否则去后半部分找。
 * 第二类 6 7 1 2 3 4 5 这种，也就是 nums[start] > nums[mid]。此例子中就是 6 > 2。
 * 这种情况下，后半部分有序。因此如果 nums[mid] <target<=nums[end]，则在后半部分找，否则去前半部分找。
 */

/**
 * @param $nums
 * @param $target
 * @return int
 */
function search($nums, $target)
{
    $length = count($nums);
    if ($length == 0) {
        return -1;
    }

    $start  = 0;
    $end = $length - 1;
    while ($start <= $end) {
        $mid = intval($start + ($end - $start) / 2);
        if ($nums[$mid] == $target) {
            return $mid;
        }

        if ($nums[$start] <= $nums[$mid]) {//前半段都是有序的
            if ($nums[$start] <= $target && $target < $nums[$mid]) {
                $end = $mid - 1;
            } else {
                $start = $mid + 1;
            }
        } else {
            if ($nums[$mid] < $target && $target <= $nums[$end]) {
                $start = $mid + 1;
            } else {
                $end = $mid - 1;
            }
        }
    }

    return -1;
}

$nums = [4,5,6,7,0,1,2];
$target = 0;

var_dump(search($nums, $target));
