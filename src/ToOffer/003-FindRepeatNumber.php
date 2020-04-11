<?php
/**
 * User: whh935
 * Date: 2020/4/8 22:35
 * Desc: 剑指offer面试题03-https://leetcode-cn.com/problems/shu-zu-zhong-zhong-fu-de-shu-zi-lcof/
 *      数组中重复的数字，找出数组中重复的数字。
 *      在一个长度为 n 的数组 nums 里的所有数字都在 0～n-1 的范围内。
 *      数组中某些数字是重复的，但不知道有几个数字重复了，也不知道每个数字重复了几次。
 *      请找出数组中任意一个重复的数字。
 *      示例 1：输入：[2, 3, 1, 0, 2, 5, 3]，输出：2 或 3
 */

class Solution
{
    /**
     * 利用hash判断
     * @param $nums
     * @return mixed
     */
    function findRepeatNumber1($nums)
    {
        $hash = [];
        $n = count($nums);
        for ($i = 0; $i < $n; $i++) {
            if (isset($hash[$nums[$i]])) {
                return $nums[$i];
            }
            $hash[$nums[$i]] = $nums[$i];
        }

        return -1;
    }

    /**
     * https://leetcode-cn.com/problems/shu-zu-zhong-zhong-fu-de-shu-zi-lcof/solution/mian-shi-ti-03-shu-zu-zhong-zhong-fu-de-shu-zi-yua/
     * 数组原地交换
     * @param $nums
     * @return int
     */
    function findRepeatNumber2($nums)
    {
        $n = count($nums);
        $i = 0;
        while ($i < $n) {
            if ($nums[$i] == $i) {
                $i++;
                continue;
            }

            if ($nums[$i] == $nums[$nums[$i]]) {
                return $nums[$i];
            }

            $tmp = $nums[$i];
            $nums[$i] = $nums[$tmp];
            $nums[$tmp] = $tmp;
        }

        return -1;
    }
}

$solution = new Solution();
$nums = [2, 3, 1, 0, 2, 5, 3];
var_dump($solution->findRepeatNumber1($nums));
var_dump($solution->findRepeatNumber2($nums));
