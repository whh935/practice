<?php
/**
 * User: whh935
 * Date: 2019/4/17 18:38
 * Desc: 搜索旋转排序数组-https://leetcode-cn.com/problems/search-in-rotated-sorted-array/
 *      假设按照升序排序的数组在预先未知的某个点上进行了旋转。
 *      ( 例如，数组 [0,1,2,4,5,6,7] 可能变为 [4,5,6,7,0,1,2] )。
 *      搜索一个给定的目标值，如果数组中存在这个目标值，则返回它的索引，否则返回 -1 。
 *      你可以假设数组中不存在重复的元素。
 *      你的算法时间复杂度必须是 O(log n) 级别。
 *      示例 1:
 *          输入: nums = [4,5,6,7,0,1,2], target = 0
 *          输出: 4
 *      示例 2:
 *          输入: nums = [4,5,6,7,0,1,2], target = 3
 *          输出: -1
 */

class Solution
{
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
}

$solution = new Solution();
$nums = [4,5,6,7,0,1,2];
$target = 0;
var_dump($solution->search($nums, $target));
