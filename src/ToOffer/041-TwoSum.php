<?php
/**
 * User: whh935
 * Date: 2020/3/8 23:19
 * Desc: 剑指offer面试题41
 *      和为s的两个数字
 *      输入一个递增排序的数组和一个数字s，在数组中查找两个数，使得它们的和正好是s。
 *      如果有多对数字的和等于s，则输出任意一对即可。
 *      如nums = [2,7,11,15], target = 9，返回：[2,7] 或者 [7,2]
 */

/**
 * hash
 * @param $nums
 * @param $target
 * @return array
 */
function twoSum($nums, $target)
{
    $map = [];
    foreach ($nums as $key => $value) {
        if (isset($map[$target - $value])) {
            return [$target - $value, $value];
        }

        $map[$value] = $key;
    }

    return [];
}

$nums = [2,7,11,15];
$target = 9;
var_dump(twoSum($nums, $target));