<?php
/**
 * User: whh935
 * Date: 2020/3/13 10:16
 * Desc: LeetCode第349题-https://leetcode-cn.com/problems/intersection-of-two-arrays/
 *      两个数组的交集:
 *      给定两个数组，编写一个函数来计算它们的交集。
 *      如nums1 = [1,2,2,1]，nums2 = [2,2]，输出[2]
 */

class Solution
{
    /**
     * @param $nums1
     * @param $nums2
     * @return array
     */
    function intersection($nums1, $nums2)
    {
        $map = [];
        foreach ($nums1 as $num1) {
            $map[$num1] = true;
        }

        $res = [];
        foreach ($nums2 as $num2) {
            if (isset($map[$num2])) {
                $res[] = $num2;
                unset($map[$num2]);
            }
        }

        return $res;
    }
}

$solution = new Solution();
$nums1 = [1,2,2,1];
$nums2 = [2,2];
var_dump($solution->intersection($nums1, $nums2));