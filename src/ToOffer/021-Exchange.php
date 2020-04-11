<?php
/**
 * User: whh935
 * Date: 2020/3/13 18:20
 * Desc: 剑指offer面试题21-https://leetcode-cn.com/problems/diao-zheng-shu-zu-shun-xu-shi-qi-shu-wei-yu-ou-shu-qian-mian-lcof/
 *      调整数组顺序使奇数位于偶数前面
 *      输入一个整数数组，实现一个函数来调整该数组中数字的顺序，
 *      使得所有奇数位于数组的前半部分，所有偶数位于数组的后半部分。
 *      输入：nums = [1,2,3,4]，输出：[1,3,2,4]，注：[3,1,2,4] 也是正确的答案之一。
 */

class Solution
{
    /**
     * @param $nums
     * @return mixed
     */
    function exchange($nums)
    {
        $left = 0;
        $right = count($nums) - 1;
        while ($left < $right) {
            //从前往后找偶数
            if (($nums[$left] & 1) != 0) {
                $left++;
                continue;
            }

            //从后往前找奇数
            if (($nums[$right] & 1) == 0) {
                $right--;
                continue;
            }

            //奇偶交换
            $tmp = $nums[$left];
            $nums[$left] = $nums[$right];
            $nums[$right] = $tmp;
        }

        return $nums;
    }
}

$solution = new Solution();
$nums = [1,2,3,4];
var_dump($solution->exchange($nums));
