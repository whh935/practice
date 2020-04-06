<?php
/**
 * User: whh935
 * Date: 2020/4/6 21:51
 * Desc: LeetCode第4题-https://leetcode-cn.com/problems/median-of-two-sorted-arrays/
 *      给定两个大小为 m 和 n 的有序数组 nums1 和 nums2。
 *      请你找出这两个有序数组的中位数，并且要求算法的时间复杂度为 O(log(m + n))。
 *      你可以假设 nums1 和 nums2 不会同时为空。
 *      示例1：nums1 = [1, 3]，nums2 = [2]，则中位数是 2.0
 *      示例2：nums1 = [1, 2]，nums2 = [3, 4]，则中位数是 (2 + 3)/2 = 2.5
 */

class Solution
{
    /**
     * https://leetcode-cn.com/problems/median-of-two-sorted-arrays/solution/xiang-xi-tong-su-de-si-lu-fen-xi-duo-jie-fa-by-w-2/
     * @param $nums1
     * @param $nums2
     * @return float
     */
    function findMedianSortedArrays($nums1, $nums2)
    {
        $m = count($nums1);
        $n = count($nums2);
        if ($m > $n) {// 保证m <= n
            return $this->findMedianSortedArrays($nums2, $nums1);
        }

        $i_min = 0;
        $i_max = $m;
        while ($i_min <= $i_max) {
            $i = (int)(($i_min + $i_max) / 2);
            $j = (int)(($m + $n + 1) / 2) - $i;
            if ($j != 0 && $i != $m && $nums2[$j - 1] > $nums1[$i]) {// i需要增大
                $i_min = $i + 1;
            } elseif ($i != 0 && $j != $n && $nums1[$i - 1] > $nums2[$j]) {// i需要减小
                $i_max = $i - 1;
            } else {// 达到要求，并且将边界条件列出来单独考虑
                if ($i == 0) {
                    $max_left = $nums2[$j - 1];
                } elseif ($j == 0) {
                    $max_left = $nums1[$i - 1];
                } else {
                    $max_left = max($nums1[$i - 1], $nums2[$j - 1]);
                }

                if (($m + $n) % 2 == 1) {// 奇数的话不需要考虑右半部分
                    return $max_left;
                }

                if ($i == $m) {
                    $min_right = $nums2[$j];
                } elseif ($j == $n) {
                    $min_right = $nums1[$i];
                } else {
                    $min_right = min($nums1[$i], $nums2[$j]);
                }

                //如果是偶数的话返回结果
                return ($max_left + $min_right) / 2.0;
            }
        }

        return 0.0;
    }
}

$solution = new Solution();
$nums1 = [3];
$nums2 = [-2, -1];
var_dump($solution->findMedianSortedArrays($nums1, $nums2));
