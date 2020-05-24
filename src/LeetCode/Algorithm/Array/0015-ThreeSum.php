<?php
/**
 * User: whh935
 * Date: 2019/4/11 19:59
 * Desc: 三数之和-https://leetcode-cn.com/problems/3sum/
 *      给你一个包含 n 个整数的数组 nums，判断 nums 中是否存在三个元素 a，b，c ，
 *      使得 a + b + c = 0 ？请你找出所有满足条件且不重复的三元组。
 *      注意：答案中不可以包含重复的三元组。
 *      示例：
 *          给定数组 nums = [-1, 0, 1, 2, -1, -4]，
 *          满足要求的三元组集合为：
 *          [
 *              [-1, 0, 1],
 *              [-1, -1, 2]
 *          ]
 */

class Solution
{
    /**
     * 思路：
     *  1.先将数组排序
     *  2.先固定一个值，然后用双指针法遍历右侧的子数组，寻找sum=0的case
     *  3.每遇到一个值都判断和前面的值是否相等，相等就跳过（避免重复）
     */
    /**
     * @param $nums
     * @return array
     */
    function threeSum($nums)
    {
        $result = [];
        $length = count($nums);
        if ($length < 3) {
            return $result;
        }
        sort($nums);

        for ($i = 0; $i < $length - 2 && $nums[$i] <= 0; $i++) {
            if ($i > 0 && $nums[$i] == $nums[$i - 1]) { // 过滤相同值
                continue;
            }

            $curr[0] = $nums[$i];
            for ($left = $i + 1, $right = $length - 1; $left < $right;) {
                $sum = $nums[$i] + $nums[$left] + $nums[$right];
                if ($sum == 0) {
                    $curr[1] = $nums[$left++];
                    $curr[2] = $nums[$right--];
                    if (!in_array($curr, $result)) {
                        $result[] = $curr;
                    }
                    while ($left < $right && $nums[$left] == $nums[$left - 1]) {
                        $left++;
                    }
                    while ($left < $right && $nums[$right] == $nums[$right + 1]) {
                        $right--;
                    }
                } elseif ($sum > 0) {
                    $right--;
                    while ($nums[$right] == $nums[$right + 1] && $right > $left) {
                        $right--;
                    }
                } else {
                    $left++;
                    while ($nums[$left] == $nums[$left - 1] && $right > $left) {
                        $left++;
                    }
                }
            }
        }

        return $result;
    }
}

$solution = new Solution();
$nums = [-1,0,1,2,-1,-4];
$result = $solution->threeSum($nums);
var_dump($result);
