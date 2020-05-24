<?php
/**
 * User: whh935
 * Date: 2020/5/16 22:38
 * Desc: 移除元素-https://leetcode-cn.com/problems/remove-element/
 *      给你一个数组 nums 和一个值 val，你需要 原地 移除所有数值等于 val 的元素，并返回移除后数组的新长度。
 *      不要使用额外的数组空间，你必须仅使用 O(1) 额外空间并 原地 修改输入数组。
 *      元素的顺序可以改变。你不需要考虑数组中超出新长度后面的元素。
 *      示例 1:
 *          给定 nums = [3,2,2,3], val = 3,
 *          函数应该返回新的长度 2, 并且 nums 中的前两个元素均为 2。
 *          你不需要考虑数组中超出新长度后面的元素。
 */

class Solution
{
    /**
     * @param $nums
     * @param $val
     * @return int
     */
    function removeElement(&$nums, $val)
    {
        $i = 0;
        $n = count($nums);
        while ($i < $n) {
            if ($nums[$i] == $val) {
                $nums[$i] = $nums[$n - 1];
                $n--;
            } else {
                $i++;
            }
        }

        return $n;
    }
}

$solution = new Solution();
$nums = [3, 2, 2, 3];
$val = 3;
var_dump($solution->removeElement($nums, 3));
print_r($nums);
