<?php
/**
 * User: whh935
 * Date: 2020/4/4 17:19
 * Desc: LeetCode第88题-https://leetcode-cn.com/problems/merge-sorted-array/
 *      给你两个有序整数数组 nums1 和 nums2，
 *      请你将 nums2 合并到 nums1 中，使 num1 成为一个有序数组。
 *      说明:
 *          初始化 nums1 和 nums2 的元素数量分别为 m 和 n 。
 *          你可以假设 nums1 有足够的空间（空间大小大于或等于 m + n）来保存 nums2 中的元素。
 *      示例:
 *          输入:
 *              nums1 = [1,2,3,0,0,0], m = 3
 *              nums2 = [2,5,6],       n = 3
 *          输出: [1,2,2,3,5,6]
 */

class Solution
{
    /**
     * 从后往前进行比较
     * @param $nums1
     * @param $m
     * @param $nums2
     * @param $n
     */
    function merge(&$nums1, $m, $nums2, $n)
    {
        $merge_index = $m-- + $n-- - 1;
        while ($m >= 0 && $n >= 0) {
            $nums1[$merge_index--] = $nums1[$m] > $nums2[$n] ? $nums1[$m--] : $nums2[$n--];
        }

        while ($n >= 0) {
            $nums1[$merge_index--] = $nums2[$n--];
        }
    }
}

$solution = new Solution();
$nums1 = [1,2,3,0,0,0];
$nums2 = [2,5,6];
$solution->merge($nums1, 3, $nums2, 3);
var_dump($nums1);

//$nums1 = [0];
//$nums2 = [1];
//$solution->merge($nums1, 0, $nums2, 1);
//var_dump($nums1);
