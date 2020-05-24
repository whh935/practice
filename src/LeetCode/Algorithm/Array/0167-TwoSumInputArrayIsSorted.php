<?php
/**
 * User: whh935
 * Date: 2019/6/18 21:13
 * Desc: 两数之和 II - 输入有序数组-https://leetcode-cn.com/problems/two-sum-ii-input-array-is-sorted/
 *      给定一个已按照升序排列 的有序数组，找到两个数使得它们相加之和等于目标数。
 *      函数应该返回这两个下标值 index1 和 index2，其中 index1 必须小于 index2。
 *      说明:
 *          返回的下标值（index1 和 index2）不是从零开始的。
 *          你可以假设每个输入只对应唯一的答案，而且你不可以重复使用相同的元素。
 *      示例:
 *          输入: numbers = [2, 7, 11, 15], target = 9
 *          输出: [1,2]
 *          解释: 2 与 7 之和等于目标数 9 。因此 index1 = 1, index2 = 2 。
 */

class Solution
{
    /**
     * @param $numbers
     * @param $target
     * @return array
     */
    function twoSum($numbers, $target)
    {
        $length = count($numbers);
        if ($length <= 1) {
            return [];
        }

        $left  = 0;
        $right = $length - 1;
        while ($left < $right) {
            $sum = $numbers[$left] + $numbers[$right];
            if ($sum == $target) {
                return [$left + 1, $right + 1];
            } elseif ($sum > $target) {
                $right--;
            } else {
                $left++;
            }
        }

        return [];
    }
}

$solutio = new Solution();
$arr = [2, 7, 11, 15];
var_dump($solutio->twoSum($arr, 9));exit;
